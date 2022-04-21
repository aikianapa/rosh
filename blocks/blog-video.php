<view>
    <div class="row container">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="blog-inner__text">
                <div class="content-wrap">
                    <div class="text video">
                        <iframe width="560" class="radius-20" height="315" src="{{video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Блог видео">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <wb-var id="Id{{wbNewId()}}" />
        <label>Ссылка на видео</label>
        <input class="form-control mb-3" id="{{_var.id}}" type="text" name="video" placeholder="Ссылка на видео">
        <iframe width="560" height="315" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <script wb-app>
        $("#{{_var.id}}").change(function() {
            $(this).next('iframe').attr('src', $(this).val())
        })
        $("#{{_var.id}}").trigger('change');
    </script>
    </div>
</edit>