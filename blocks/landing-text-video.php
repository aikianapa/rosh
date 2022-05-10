<edit header="Лендинг - текст и видео">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label>Текст</label>
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Ссылка на YouTube</label>
        <div class="col-sm-9">
            <input name="video" class="form-control">
        </div>
    </div>
</edit>

<view>
<div class="landing">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-8">
                    <div class="content-wrap">
                        <div class="text">
                            <p class="text-break">{{text}}</p>
                        </div>
                        <div class="video mb-80">
                            <iframe width="560" height="315" src="{{video}}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text">
                            <p>Некоторые разновидности дерматитов являются кожной реакцией на аллерген – это может быть атопический или контактный дерматит. Заболевание является воспалительным и обязательно должно пролечиваться, однако не устранив контакт с аллергеном, сделать это не получится.</p>
                        </div>
                        <div class="video mb-80">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/IalD-nbVuq8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>