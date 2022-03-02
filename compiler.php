<?php
    /**
     * Simple template compiler
     */

    class Compiler {
        const FN_SRC    = 'src';
        const FN_CHUNKS = 'chunks';
        const REX_CHUNK = "#\{\{([\w\-\/]+)(((:?\s*)\&([\w\-]+)\=`([^`]*)`)*)(\s*)\}\}#si";
        const REX_VAR   = "#\[\+([\w\-]+)\+\]#si";

        protected $_path = null;

        public function __construct($path = null) {
            $this->_path = empty($path) ? dirname(__FILE__) : rtrim($path, '/');
            $this->_path = strtr($this->_path, '\\', '/').'/';
        }

        protected function _files() {
            $files = array();
            if ($src = scandir($this->_path.static::FN_SRC)) {
                foreach ($src as $src_i) {
                    if (in_array($src_i, array('.', '..', 'chunks')) || is_dir($this->_path.$src_i)) continue;
                    $files[] = $src_i;
                }
            }
            return $files;
        }

        protected function _data($s) {
            $data = array();
            preg_match_all('#\&([\w\-]+)\=`([^`]*)`#siu', $s, $v, PREG_SET_ORDER);
            if (!empty($v)) foreach ($v as $vi) $data[$vi[1]] = $vi[2];
            return $data;
        }

        public function chunk($name, $data = null) {
            static $cache = null;
            if ($cache === null) $cache = array();
            if (!isset($cache[$name])) {
                $p = $this->_path.static::FN_SRC.'/'.static::FN_CHUNKS.'/';
                if (!file_exists($p.$name.'.html')) return '<!-- Chunk not found: '.$name.' -->';
                $cache[$name] = file_get_contents($p.$name.'.html');
            }
            $chunk = $cache[$name];
            if (is_array($data)) foreach ($data as $k => $v) {
                $chunk = str_replace('[+'.$k.'+]', $v, $chunk);
            }
            $chunk = preg_replace(static::REX_VAR, '', $chunk);
            return $this->parse($chunk);
        }

        public function parse($str) {
            if (preg_match(static::REX_CHUNK, $str)) {
                $parser = $this;
                $str = preg_replace_callback(static::REX_CHUNK, function($m) use ($parser) {
                    $key  = $m[1];
                    $data = empty($m[2]) ? array() : $this->_data($m[2]);
                    return $this->chunk($key, $data);
                }, $str);
            }
            return $str;
        }

        public function execute($files = null) {
            if (empty($files)) $files = $this->_files();
            foreach ($files as $srcf) {
                $src = file_get_contents($this->_path.static::FN_SRC.'/'.$srcf);
                $src = $this->parse($src);
                file_put_contents($this->_path.$srcf, $src);
            }
        }
    }

    $compiler = new Compiler();
    $compiler->execute();