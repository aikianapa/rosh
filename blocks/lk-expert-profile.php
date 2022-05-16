<view>
    <div class="account">
        <div class="container">
            <form id="userProfile">
                <wb-data wb="table=users&item={{_sess.user.id}}">
                    <div class="title-flex --flex --jcsb --aicn mb-40">
                        <div class="lk-title mb-0">Редактировать личные данные </div>
                        <button type="button" class="btn btn--black" wb-save="{'table':'users','item':'{{_id}}','form':'#userProfile','update':'cms.list.users' }">Сохранить изменения</button>
                    </div>
                    <div class="grey-form">

                        <h2 class="h2 mb-30">Личные данные</h2>
                        <div class="grey-form__wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input">
                                        <input class="input__control" name="fullname" type="text" placeholder="ФИО" required>
                                        <div class="input__placeholder">ФИО</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input">
                                        <input class="input__control datebirthdaypickr" name="birthdate" type="text" placeholder="Дата рождения" required>
                                        <div class="input__placeholder">Дата рождения</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right"><a class="grey-form__link" href="#"> </a></div>
                                    <div class="input">
                                        <input class="input__control" name="email" type="email" placeholder="E-mail" required>
                                        <div class="input__placeholder">E-mail</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input">
                                        <input class="input__control" name="phone" type="tel" required placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                        <div class="input__placeholder">Номер телефона</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="grey-form">
                        <div class="title-flex --flex mb-30">
                            <h2 class="h2 mb-0 mr-15">Смена пароля</h2>
                            <p class="text-grey text-bold pt-1">Необязательно</p>
                        </div>
                        <div class="grey-form__wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input">
                                        <input class="input__control tel" name="pwd_current" type="password" placeholder="Текущий пароль">
                                        <div class="input__placeholder">Текущий пароль</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input">
                                        <input class="input__control tel" name="pwd_new" type="password" placeholder="Новый пароль">
                                        <div class="input__placeholder">Новый пароль</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input">
                                        <input class="input__control tel" name="pwd_check" type="password" placeholder="Повторите новый пароль">
                                        <div class="input__placeholder">Повторите новый пароль</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </wb-data>
            </form>
        </div>
    </div>
    <script wbapp remove>
        $(document).on('wb-save-done', function (e, res) {
            document.location.href = '/lk/{{_sess.user.role}}'
        })
    </script>
</view>
<edit header="ЛК Специалиста - профиль">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>