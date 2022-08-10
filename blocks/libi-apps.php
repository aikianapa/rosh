<view>

    <div class="container">
        <div class="post__wrap">
            <div class="post__wrap-block"></div>
            <div class="post__wrap-info">
                <span class="post-title">{{title_up}}</span>
                <ul class="post-links">
                    <li><a href="{{appstore_link}}">AppStore</a></li>
                    <li><a href="{{goole_play_link}}">Google Play</a></li>
                </ul>
                <div class="post-bl">
                    <b>Марка</b>
                    <div class="post-sb">{{mark}}</div>
                </div>
                <span class="post-title">{{title_bottom}}</span>
                <p>{{text}}</p>
            </div>
        </div>
    </div>



</view>

<edit header="Libi - приложения">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Верхний заголовок</label>
        <div class="col-sm-8">
            <input name="title_up" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Нижний заголовок</label>
        <div class="col-sm-8">
            <input name="title_bottom" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-sm-4">Марка</label>
        <div class="col-sm-8">
            <input name="mark" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-sm-4">Ссылка AppStore</label>
        <div class="col-sm-8">
            <input name="appstore_link" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-sm-4">Ссылка Google Play</label>
        <div class="col-sm-8">
            <input name="google_play_link" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-sm-4">Текст</label>
        <div class="col-sm-8">
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>

</edit>