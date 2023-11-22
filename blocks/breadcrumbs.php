<view>
    <div class="container">
        <div class="crumbs post" itemscope itemtype="https://schema.org/BreadcrumbList">
          <div>
            <a class="crumbs__arrow" href="javascript:window.history.back();">
              <svg class="svgsprite _crumbs-back">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
              </svg>
            </a>
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a class="crumbs__link" href="/" itemprop="item"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1" />
            </span>
            <wb-var formpath="/{{_route.form}}" wb-if="'{{_route.form}}'!=='pages'" else='' />
            <wb-var midcrumb='{{headerByPath({{_parent.path}})}}' wb-if="'{{_parent.path}}'>'/'" else='{{headerByPath({{_var.formpath}})}}' />
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a class="crumbs__link" href="{{_parent.path}}" itemprop="item" wb-if="'{{_var.midcrumb}}'>'' && '{{_var.formpath}}'==''">
                    <span itemprop="name">{{_var.midcrumb}}</span>
                </a>
                <meta itemprop="position" content="2" />
            </span>
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a class="crumbs__link" href="/{{_route.form}}" itemprop="item" wb-if="'{{_var.midcrumb}}'>'' && '{{_var.formpath}}'>''">
                    <span itemprop="name">{{_var.midcrumb}}</span>
                </a>
                <meta itemprop="position" content="2" />
            </span>
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="crumbs__link last" itemprop="name">{{_parent.header}}</span>
                <meta itemprop="position" content="3" />
            </span>
          </div>
          <p wb-if="'{{_parent.date}}'>''">
            Дата публикации / дата обновления: {{dateform(_parent.date)}}
          </p>
          <p wb-if="'{{_parent.date}}'==''">
            Дата публикации / дата обновления: {{dateform(_parent._created)}}
          </p>
        </div>
    </div>
</view>

<edit header="Заголовок и «хлебные крошки»">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="alert alert-info">
        Данный блок не требует редактирования
    </div>
</edit>