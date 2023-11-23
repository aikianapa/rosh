<view>
  <div wb-if="'{{_sess.user.role}}'=='client'">

    <div class="popup --children-create strict_close">
      <template id="popupChildrenCreate">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <form class="popup__panel popup__panel-wide" on-submit="submit">
            <button class="popup__close" on-click="cancel">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Добавить ребёнка</div>

            <div class="row">
              <div class="input input-grey col-md-9">
                <input class="input__control" required="" type="text" placeholder="ФИО" value=""
                       name="fullname">
                <div class="input__placeholder input__placeholder--dark">ФИО</div>
              </div>
              <div class="input input-grey col-md-3">
                <input class="input__control datebirthdaypickr" type="text" required=""
                       placeholder="Дата рождения" value="" name="birthdate" inputmode="text">
                <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
              </div>
            </div>
            <button class="btn btn--black form-submit" type="submit">
              Добавить
            </button>
          </form>


          <div class="popup__panel --succed">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Добавление ребёнка</div>
            <h3 class="h3">Успешно!</h3>
          </div>
        </div>
      </template>
    </div>

    <script wbapp>
      window.popupCreateChildren = function (user_id) {
        var popup = new Ractive({
          el: '.popup.--children-create',
          template: wbapp.tpl('#popupChildrenCreate').html,
          data: {
            user: wbapp._session.user,
            'selector': null
          },
          on: {
            teardown() {
              console.log("teardown")
            },
            complete() {
              this.set('catalog', catalog);
              initServicesSearch($('.search-services'), catalog.servicesList);
              initPlugins($(this.el));
              console.log("complete")
            },
            submit(ev) {
              var _token = wbapp._session.token;
              let $form = $(ev.node);
              let uid = popup.get('user.id');

              if ($form.verify() && uid > '') {
                let form_data = {
                  ...$form.serializeJSON(),
                  parent_id: page.get("user.parent_id") || page.get("user.id"),
                  role: 'client',
                  confirmed: 0,
                  active: "on",
                  __token: _token,
                };

                window.api.post('/api/v2/save/users/', form_data).then(
                  function (data) {
                    if (data.error) {
                      wbapp.trigger('wb-save-error', {
                        'data': data
                      });
                    } else {
                      page.set("user.childrens", page.get('user.childrens') === undefined
                        ? [data.id]
                        : [data.id, ...page.get("user.childrens")])

                      $(".--children-create .popup__panel-wide").addClass("d-none")
                      $(".--children-create .popup__panel.--succed").addClass("d-block")

                      Cabinet.updateProfile(page.get('user.id'), page.get('user'), function (data) {
                        page.set("user", data);
                        location.reload();
                      })
                    }
                  });
              }

              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --record strict_close">
      <template id="popupRecord">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <form class="popup__panel popup__panel-wide" on-submit="submit">
            <button class="popup__close" on-click="cancel">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <div class="mb-10 text-bold">Разделы услуг</div>
            <div class="popups__text-chexboxs service-categories">
              <label class="text-radio">
                <input type="radio" name="service_category" value="{{id}}" checked
                       on-click="selectCategory">
                <span>Все услуги</span>
              </label>
              {{#each categories}}
              <label class="text-radio">
                <input type="radio" name="service_category" value="{{id}}" on-click="selectCategory">
                <span>{{name}}</span>
              </label>
              {{/each}}
            </div>
            <div class="input" data-hide="service-search">
              <input class="search__input search-services" type="text" placeholder="Поиск по услугам">
              <div class="search__drop"></div>
              <div class="service-search__list" style="position: relative;"></div>
              <button class="search__btn" type="button">
                <svg class="svgsprite _search">
                  <use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
                </svg>
              </button>

            </div>
            <label class="checkbox checkbox--record hider-checkbox" data-hide-input="service-search">
              <input class="checkbox-hidden-next-form" type="checkbox" name="no_services" value="1">
              <span></span>
              <div class="checbox__name">Мне лень искать в списке, скажу администратору</div>
            </label>
            <div class="mb-20 consultations">
              <label class="checkbox checkbox--record show-checkbox" data-show-input="consultation-type">
                <input type="hidden" name="for_consultation" value="0">

                {{#if record.for_consultation === '1' }}
                <input class="checkbox-visible-next-form" type="checkbox" checked
                       name="for_consultation" value="1">
                {{else}}
                <input class="checkbox-visible-next-form" type="checkbox" name="for_consultation"
                       value="1">
                {{/if}}
                <span></span>
                <div class="checbox__name">Консультация врача</div>
              </label>
              <div class="select-form" data-show="consultation-type"
                   style="display: {{#if record.for_consultation === '1' }} block {{else}} none {{/if}};">
                <div class="mb-10 text-bold">Тип события</div>
                <div class="popups__text-chexboxs">
                  {{#each @global.catalog.quoteType as qt}}
                  <label class="text-radio show-checkbox" data-show-input="consultation-{{ qt.id }}">
                    {{#if qt.id === record.type }}
                    <input type="radio" name="type" class="consultation-type {{qt.id}}"
                           value="{{ qt.id }}" checked>
                    {{else}}
                    <input type="radio" name="type" value="{{ qt.id }}"
                           class="consultation-type {{qt.id}}">
                    {{/if}}
                    <span>{{qt.name}}</span>
                  </label>
                  {{/each}}
                </div>
                <div class="admin-editor__patient price-list">
                  {{#each @global.catalog.spec_service.consultations.online}}
                  <div
                    class="search__drop-item consultation online {{#if record.consultation == this.id }}selected{{/if}}"
                    data-show="consultation-online" data-consultation="{{this.id}}"
                    data-price="{{this.price}}"
                    style="display: {{#if record.type === 'online' }} flex {{else}} none {{/if}};">

                    <label class="checkbox search__drop-name" data-name="{{this.header}}"
                           data-price="{{this.price}}" data-id="{{this.id}}">
                      {{#if record.consultation == this.id }}
                      <input type="radio" name="consultation" value="{{this.id}}"
                             data-name="{{this.header}}" data-price="{{this.price}}"
                             checked="checked">
                      {{else}}
                      <input type="radio" name="consultation" value="{{this.id}}"
                             data-name="{{this.header}}" data-price="{{this.price}}">
                      {{/if}}
                      <span></span>
                      <div class="checbox__name">{{this.header}}</div>
                    </label>
                    <label class="search__drop-right">
                      <div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }}
                        ₽
                      </div>
                    </label>
                  </div>
                  {{/each}}
                  {{#each @global.catalog.spec_service.consultations.clinic}}
                  <div
                    class="search__drop-item consultation clinic {{#if record.consultation == this.id }}selected{{/if}}"
                    data-show="consultation-clinic"
                    data-consultation="{{this.id}}"
                    data-price="{{this.price}}"
                    data-count="{{@global.utils.ifNull(this.count, 1)}}"
                    style="display: {{#if record.type === 'clinic' }} flex {{else}} none {{/if}};">
                    <label class="checkbox search__drop-name"
                           data-name="{{this.header}}" data-price="{{this.price}}"
                           data-id="{{this.id}}">
                      {{#if record.consultation == this.id }}
                      <input type="radio" name="consultation" value="{{this.id}}"
                             data-name="{{this.header}}" data-price="{{this.price}}"
                             checked="checked">
                      {{else}}
                      <input type="radio" name="consultation" value="{{this.id}}"
                             data-name="{{this.header}}" data-price="{{this.price}}">
                      {{/if}}
                      <span></span>
                      <div class="checbox__name">{{this.header}}</div>
                    </label>
                    <label class="search__drop-right">
                      <input type="number" class="service-count"
                             title="Количество"
                             name="service_prices[{{service_id}}-{{price_id}}][count]"
                             value="{{@global.utils.ifNull(this.count, 1)}}" min="1" max="99">
                      <span class="service-count-label"> ед.</span>
                      <div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }}
                        ₽
                      </div>
                    </label>
                  </div>
                  {{/each}}
                </div>
              </div>
              <input type="hidden" class="consultation_price" name="consultation_price"
                     value="{{record.consultation_price}}">
            </div>

            <label class="checkbox checkbox--record hider-checkbox" data-hide-input="expert">
              <input class="checkbox-hidden-next-form" type="checkbox" name="no_experts" value="1">
              <span></span>
              <div class="checbox__name">Я не знаю, кого выбрать</div>
            </label>
            <div class="select-form" data-hide="expert">
              <div class="select">
                <div class="select__main">
                  <div class="select__placeholder">Выберите специалиста</div>
                  <div class="select__values"></div>
                </div>
                <div class="select__list single">
                  {{#each @global.catalog.experts}}
                  <div class="select__item select__item--checkbox">
                    <label class="checkbox checkbox--record">
                      <input type="checkbox" name="experts[]" value="{{id}}">
                      <span></span>
                      <div class="checbox__name">
                        <div class="select__name">{{fullname}}</div>
                      </div>
                    </label>
                  </div>
                  {{/each}}
                </div>
              </div>
            </div>
            <div class="admin-editor__patient" data-hide="service-search">
              <div class="mb-10 text-bold">Выбраны услуги</div>
              <div class="search__drop-item selected-consultation"
                   style="display: {{#if record.consultation }} flex {{else}} none {{/if}};">
                <div class="search__drop-name consultation-header">
                  <div class="search__drop-delete fake" onclick="unselectConsultation(this);">
                    <svg class="svgsprite _delete">
                      <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                    </svg>
                  </div>
                  <span>
										{{@global.catalog.spec_service.consultations[record.type][record.consultation].header}}
									</span>
                </div>
                <div class="search__drop-right">
                  <div class="search__drop-summ consultation-price">
                    {{@global.utils.formatPrice(@global.catalog.spec_service.consultations[record.type][record.consultation].price)}}
                    ₽<sup><b>*</b></sup>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 admin-editor__summ" data-hide="service-search">
              <p>Всего</p>
              <input type="hidden" name="price" value="0">
              <p class="price">0 ₽
                <sup>
                  <b>*</b>
                </sup>
              </p>
            </div>
            <div class="mb-4 text-right" data-hide="service-search">
              <b>*</b>&nbsp;
              <small>Не является публичной офертой. Cтоимость указана приблизительно и может быть изменена
                в зависимости от фактически оказанных услуг</small>
            </div>
            <button class="btn btn--black form__submit" type="submit"> Записаться</button>
          </form>

          <div class="popup__panel --succed">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <h3 class="h3">Успешно!</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время.</p>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupCreateClientQuote = function (user_id) {
        var popup = new Ractive({
          el: '.popup.--record',
          template: wbapp.tpl('#popupRecord').html,
          data: {
            user: wbapp._session.user,
            'experts': catalog.experts,
            'categories': catalog.categories,
            'services': catalog.services,
            'selector': null
          },
          on: {
            teardown() {
              $('.autocomplete-suggestions.search__drop').remove();
            },
            complete() {
              this.set('catalog', catalog);
              initServicesSearch($('.search-services'), catalog.servicesList);
              initPlugins($(this.el));
            },
            selectCategory(ev) {
              if ($(ev.node).is(':checked')) {
                //console.log('checked');
              } else {
                //console.log('unchecked');
              }
              var _el = $(ev.node).parents('form').find('.search__input.search-services');

              setTimeout(function () {
                _el.trigger('focus');
                //_el.find('.search-services').trigger('focus');
              }, 200);
            },
            submit(ev) {
              let $form = $(ev.node);
              let uid = popup.get('user.id');

              if ($form.verify() && uid > '') {
                let form_data = $form.serializeJSON();
                let has_consultation = !!parseInt(form_data.for_consultation) &&
                  (form_data.consultation_price > 0);

                form_data.group = 'quotes';
                form_data.status = 'new';
                if (has_consultation) {
                  form_data.pay_status = 'unpay';
                } else {
                  form_data.pay_status = 'free';
                  form_data.for_consultation = 0;
                  delete form_data.consultation;
                }
                form_data.client = uid;
                form_data.priority = 0;
                form_data.marked = false;

                form_data.comment = '';
                form_data.recommendation = '';
                form_data.description = '';
                form_data.client_comment = '';

                form_data.price = parseInt(form_data.price || 0);

                if (form_data.no_services == 1) {
                  form_data.services = [];
                  form_data.service_prices = {};
                }
                if (form_data.no_experts == 1) {
                  form_data.experts = [];
                  form_data.service_prices = {};
                }
                console.log("form_data", form_data)
                console.log("catalog.categories", catalog.categories)
                console.log("catalog.services", catalog.services);

                Cabinet.createQuote(form_data, function (res) {
                  $('.popup.--record .popup__panel:not(.--succed)').addClass('d-none');
                  $('.popup.--record .popup__panel.--succed').addClass('d-block');

                  console.log("res", res);

                  if (typeof window.load == 'function') {
                    window.load();
                  }
                });
              }

              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --analize-interpretation">
      <template id="popupAnalizeInterpretation">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <div class="popup__panel">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">{{catalog.spec_service.analyses_interpretation.header}}</div>
            <form class="popup__form" method="post" on-submit="submit">
              <input type="hidden" name="pay_status" value="free">
              <input type="hidden" name="for_consultation" value="1">
              <input type="hidden" name="group" value="quotes">
              <input type="hidden" name="status" value="new">
              <input type="hidden" name="title" value="Расшифровка анализов">

              <p class="text-grey mb-30">Нажмите на способ получения расшифровки анализов</p>
              <div class="popups__text-chexboxs">
                <label class="text-radio">
                  <input type="radio" name="type" value="clinic" checked>
                  <span>В клинике</span>
                </label>
                <label class="text-radio switch-blocks">
                  <input type="radio" name="type" value="online">
                  <span>Онлайн</span>
                </label>
              </div>
              <button class="btn btn--black popup__change form__submit" type="submit">
                Оставить заявку
              </button>
            </form>
          </div>
          <div class="popup__panel --succed">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Заявка на прием</div>
            <h3 class="h3">Успешно!</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время.</p>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupAnalizeInterpretation = function (client_id, record_id, analyses_file_uri, onShow) {
        let popup = new Ractive({
          el: '.popup.--analize-interpretation',
          template: wbapp.tpl('#popupAnalizeInterpretation').html,
          data: {
            catalog: catalog,
            record: {}
          },
          on: {
            init() {
              /**/
            },
            complete() {
              $(this.el).show();

              if (!!onShow) {
                onShow(this);
              }
            },
            submit() {
              var form = this.find('.popup.--analize-interpretation .popup__form');
              console.log(form);
              if ($(form).verify()) {
                var data = $(form).serializeJSON();
                data.group = 'quotes';
                data.status = 'new';
                data.client = wbapp._session.user.id;
                data.priority = 0;
                data.marked = false;

                data.comment = '';
                data.recommendation = '';
                data.description = '';
                data.client_comment = 'Расшифровка анализов';
                data.for_consultation = 1;
                if (data.type === 'online') {
                  data.price = parseInt(catalog.spec_service.analyses_interpretation.online.price);
                  data.pay_status = 'unpay';
                } else {
                  data.price = 0;
                  data.pay_status = 'free';
                }
                data.price = parseInt(data.price || 0);
                data.services = [];
                data.experts = [];
                data.service_prices = {};

                Cabinet.createQuote(data, function (res) {
                  $('.popup.--analize-interpretation .popup__panel:not(.--succed)').addClass('d-none');
                  $('.popup.--analize-interpretation .popup__panel.--succed').addClass('d-block');

                  if (typeof window.load == 'function') {
                    window.load();
                  }
                });
              }
              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --pay">
      <template id="popupPay">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <div class="popup__panel">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Внести предоплату</div>
            {{#if !this.client_email }}
            <div class="input__title text-bold mb-10" style="color: #dc3545;">Введите адрес электронной
              почты для отправки электронного чека
            </div>
            <div class="input mb-30">
              <input class="input__control" type="email" name="email" placeholder="E-mail">
              <div class="input__placeholder">E-mail</div>
            </div>
            {{/if}}
            <div class="mb-10 text-grey text-small">Стоимость услуги</div>
            <div class="mb-20 popup-summ --aifs">
              <div class="popup-summ__big">{{this.price}} ₽</div>
              <div class="popup-summ__small">Предоплата - {{this.pay_price}} ₽</div>
            </div>
            {{#if this.is_online }}
            <div class="popup__description text-grey mb-30">
              Для подтверждения необходимо произвести полную оплату
            </div>
            {{else}}
            <div class="popup__description text-grey mb-10">
              Для подтверждения необходимо произвести оплату в размере 20% от стоимости
            </div>
            <div class="popup__description text-grey text-bold mb-30">
              Просьба не закрывать страницу, пока не завершите оплату, чтобы сформировать чек
            </div>
            {{/if}}
            <!--!!! change `action` address on PROD. !!!-->
            <form on-submit="submit" action="https://pay.raif.ru/pay"
                  method="GET" target="_blank">
              <input type="hidden" name="publicId" value="000001793739001-93739001"/>
              <input type='hidden' name='amount' value='{{this.pay_price}}'/>
              <input type='hidden' name='orderId' value='{{id}}'/>
              <input type='hidden' name='successUrl' value='{{currentPage}}?pay=success'/>
              <input type='hidden' name='failUrl' value='{{currentPage}}?pay=error'/>
              <button class="btn btn--black form__submit" type="submit">
                Внести предоплату
              </button>
            </form>
            <div class="mt-20 text-grey form__description"><b>*</b>&nbsp;Нажимая на кнопку "Внести
              предоплату", Вы даете согласие на обработку своих персональных данных на основании <a
                target="_blank" href="/policy">Политики конфиденциальности</a>. Предоплата за услуги
              не возвращается. Не является публичной офертой.
            </div>
          </div>
          <div class="popup__panel --succed-pay d-none">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Внести предоплату</div>
            <h3 class="h3">Успешно!</h3>
            <p class="text-grey">Информация о предстоящем приеме будет доступна в Личном кабинете после
              подтверждения оплаты</p>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      function confirmedMessageCloseApp(e) {
        e.preventDefault();
        return  'Просьба не закрывать страницу, пока не завершите оплату. Нажмите на "отмена", чтобы оплата прошла без ошибок';
      }

      window.popupPay = function (record_id, full_price, user_id, type, consultation_price, client_email, client_phone, service_name, service_name2) {
        const pay_consultation = parseInt(consultation_price || '0');
        var price = (pay_consultation > 0) ? pay_consultation : parseInt(full_price);
        if (pay_consultation) {

        }
        const pay_price = (type == 'online') ? price : Math.floor(price / 5);
        const orderId = String(record_id) + String(Math.floor(Math.random() * 100000001));
        const receiptId = `${user_id}${record_id}${Math.floor(Math.random() * 100000001)}`;

        var popup = new Ractive({
          el: '.popup.--pay',
          template: wbapp.tpl('#popupPay').html,
          data: {
            pay_price: pay_price,
            is_online: (type == 'online'),
            price: price,
            client: user_id,
            id: orderId,
            client_email: client_email,
            client_phone: client_phone,
            service_name: service_name,
            currentPage: window.location.href
          },
          on: {
            complete() {
              $(this.el).show();
            },
            submit() {
              if (!client_email) {
                const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                const data = {
                  email: $(".popup.--pay input[name='email']").val(),
                  phone: str_replace([' ', '-', '(', ')'], '', client_phone),
                  fullname: page.get('user.fullname'),
                  first_name: page.get('user.first_name'),
                  middle_name: page.get('user.first_name'),
                  last_name: page.get('user.first_name'),
                }

                if (!emailPattern.test(data.email)) {
                  toast("Неверный формат электронной почты", "", "error")
                  return false;
                }

                this.viewmodel.value.client_email = data.email;
                $('input[name="client_email"').val(data.email)

                Cabinet.updateProfile(page.get('user.id'), data, function (data) {
                  page.set('user', data); /* get actually user data */
                  toast('Профиль успешно обновлён');
                })
              }

              window.onbeforeunload = (e) => {
                e.preventDefault();
                return  'Просьба не закрывать страницу, пока не завершите оплату. Нажмите на "отмена", чтобы оплата прошла без ошибок';
              };
              const payIntervalCheckId = setInterval(async () => {
                const result = await utils.getInfoTransaction(orderId);

                if (result.success) {
                  if (result.data.transaction.status.value === "SUCCESS") {
                    localStorage.setItem("payRecord", orderId);

                    await utils.api.post(`/api/v2/save/records/${record_id}/pay_status`, "prepay");

                    if (localStorage.getItem("payRecord")) {
                      await utils.saveReceipts({
                        receiptNumber: receiptId,
                        client: {
                          email: client_email,
                          phone: client_phone
                        },
                        items: [{
                          name: service_name,
                          price: pay_price,
                          quantity: 1,
                          amount: pay_price,
                          vatType: "NONE",
                          paymentObject: "PAYMENT",
                          paymentMode: "PREPAYMENT"
                        }],
                        total: pay_price
                      }).then(async (data) => {
                        if (data !== false) {
                          localStorage.removeItem("payRecord")
                          await utils.regReceipts(data.receiptNumber)
                        }
                      })
                    }

                    window.removeEventListener("beforeunload", confirmedMessageCloseApp);
                    clearInterval(payIntervalCheckId);
                    document.querySelector(".--pay-succed").style.display = "flex"
                  }

                } else {
                  document.querySelector(".--pay-error").style.display = "flex"
                  clearInterval(payIntervalCheckId);
                  window.onbeforeunload = null;
                }
              }, 1000);

              document.querySelector(".--pay").style.display = "none"
            }
          }
        });
      };
    </script>
  </div>

  <div wb-if="in_array('{{_sess.user.role}}',['main','expert'])">
    <div class="popup --record-editor">
      <template id="popupRecordEditor">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <div class="popup__panel popup__panel-wide">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Записать пациента на прием</div>
            <form class="record-edit popup__form" on-submit="submit" data-record="{{record.id}}">
              {{#if client}}
              <input type="hidden" value="{{ client.id }}" name="client">
              <p class="mb-20 text-bold text-big">{{client.fullname}}</p>
              {{else}}
              <div class="search-form input">
                <input class="input__control autocomplete client-search" autocomplete="off" type="text"
                       placeholder="Выбрать пациента" required>
                <div class="input__placeholder">Выбрать пациента</div>
                <div class="client-search search-list" style="position: relative;"></div>
              </div>
              <input type="hidden" name="client" value="">
              {{/if}}
              <div class="row">
                <div class="col-md-12">
                  <input type="hidden" value="{{ record.id }}" name="id">
                  {{#if record.spec_service}}
                  <input type="hidden" name="spec_service" value="{{record.spec_service}}">
                  <input type="hidden" name="title"
                         value="{{@global.catalog.spec_service[record.spec_service].header}}">
                  {{else}}
                  <div class="mb-20 admin-editor__event">
                    <div class="popups__text-chexboxs service-categories">
                      <label class="text-radio">
                        <input type="radio" name="service_category" value="{{id}}" checked
                               on-click="selectCategory">
                        <span>Все услуги</span>
                      </label>
                      {{#each @global.catalog.categories}}
                      <label class="text-radio">
                        <input type="radio" name="service_category" value="{{id}}"
                               on-click="selectCategory">
                        <span>{{name}}</span>
                      </label>
                      {{/each}}
                    </div>
                    <div class="search__block --flex --aicn">
                      <div class="input">
                        <input class="popup-services-list search__input search-services"
                               type="text" placeholder="Поиск по услугам" autocomplete="off">
                        <div class="search__drop"></div>
                        <div class="service-search__list" style="position: relative;"></div>
                        <button class="search__btn" type="button">
                          <svg class="svgsprite _search">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mb-20 admin-editor__event">
                    <!-- services-select.dropdown -->
                  </div>
                  {{/if}}

                  <div class="admin-editor__type-event">
                    <div class="select-form">
                      <div class="select pay">
                        <div class="select__main">Статус оплаты</div>
                        <div class="select__list">
                          <input type="hidden" class="pay_status" name="pay_status"
                                 value="{{ record.pay_status }}">
                          {{#each @global.catalog.quotePay}}
                          <div class="select__item" data-id="{{.id}}"
                               onclick="$(this).parents('.select.pay').find('input.pay_status').val($(this).attr('data-id'));$(this).parents('.select.pay').addClass('has-values');">
                            {{name}}
                          </div>
                          {{/each}}
                        </div>
                      </div>
                    </div>
                    <div class="mb-20 consultations">
                      <label class="checkbox checkbox--record show-checkbox"
                             data-show-input="consultation-type">
                        <input type="hidden" name="for_consultation" value="0">

                        {{#if record.for_consultation === '1' }}
                        <input class="checkbox-visible-next-form" type="checkbox" checked
                               name="for_consultation" value="1">
                        {{else}}
                        <input class="checkbox-visible-next-form" type="checkbox"
                               name="for_consultation" value="1">
                        {{/if}}
                        <span></span>
                        <div class="checbox__name">Консультация врача</div>
                      </label>
                      <div class="select-form" data-show="consultation-type"
                           style="display: {{#if record.for_consultation === '1' }} block {{else}} none {{/if}};">
                        <div class="mb-10 text-bold">Тип события</div>
                        <div class="popups__text-chexboxs">
                          {{#each @global.catalog.quoteType as qt}}
                          <label class="text-radio show-checkbox"
                                 data-show-input="consultation-{{ qt.id }}">
                            {{#if qt.id === record.type }}
                            <input type="radio" name="type"
                                   class="consultation-type {{qt.id}}" value="{{ qt.id }}"
                                   checked>
                            {{else}}
                            <input type="radio" name="type" value="{{ qt.id }}"
                                   class="consultation-type {{qt.id}}">
                            {{/if}}
                            <span>{{qt.name}}</span>
                          </label>
                          {{/each}}
                        </div>
                        <div class="admin-editor__patient price-list">
                          {{#each @global.catalog.spec_service.consultations.online}}
                          <div
                            class="search__drop-item consultation online {{#if record.consultation == this.id }}selected{{/if}}"
                            data-show="consultation-online" data-consultation="{{this.id}}"
                            data-price="{{this.price}}"
                            style="display: {{#if record.type === 'online' }} flex {{else}} none {{/if}};">

                            <label class="checkbox search__drop-name"
                                   data-name="{{this.header}}" data-price="{{this.price}}"
                                   data-id="{{this.id}}">
                              {{#if record.consultation == this.id }}
                              <input type="radio" name="consultation" value="{{this.id}}"
                                     data-name="{{this.header}}"
                                     data-price="{{this.price}}" checked="checked">
                              {{else}}
                              <input type="radio" name="consultation" value="{{this.id}}"
                                     data-name="{{this.header}}"
                                     data-price="{{this.price}}">
                              {{/if}}
                              <span></span>
                              <div class="checbox__name">{{this.header}}</div>
                            </label>
                            <label class="search__drop-right">
                              <div class="search__drop-summ">{{
                                @global.utils.formatPrice(this.price) }} ₽
                              </div>
                            </label>
                          </div>
                          {{/each}}
                          {{#each @global.catalog.spec_service.consultations.clinic}}
                          <div
                            class="search__drop-item consultation clinic {{#if record.consultation == this.id }}selected{{/if}}"
                            data-show="consultation-clinic" data-consultation="{{this.id}}"
                            data-price="{{this.price}}"
                            style="display: {{#if record.type === 'clinic' }} flex {{else}} none {{/if}};">
                            <label class="checkbox search__drop-name"
                                   data-name="{{this.header}}" data-price="{{this.price}}"
                                   data-id="{{this.id}}">
                              {{#if record.consultation == this.id }}
                              <input type="radio" name="consultation" value="{{this.id}}"
                                     data-name="{{this.header}}"
                                     data-price="{{this.price}}" checked="checked">
                              {{else}}
                              <input type="radio" name="consultation" value="{{this.id}}"
                                     data-name="{{this.header}}"
                                     data-price="{{this.price}}">
                              {{/if}}
                              <span></span>
                              <div class="checbox__name">{{this.header}}</div>
                            </label>
                            <label class="search__drop-right">
                              <div class="search__drop-summ">{{
                                @global.utils.formatPrice(this.price) }} ₽
                              </div>
                            </label>
                          </div>
                          {{/each}}
                        </div>
                      </div>
                      <input type="hidden" class="consultation_price" name="consultation_price"
                             value="{{record.consultation_price}}">
                    </div>
                    <div class="row">
                      {{#if record.spec_service}} {{else}}
                      <div class="col-md-6">
                        <div class="select-form select-checkboxes">
                          <div class="select select_experts">
                            <div class="select__main">
                              <div class="select__placeholder">Выберите специалиста</div>
                              <div class="select__values"></div>
                            </div>
                            <div class="select__list single">
                              {{#each @global.catalog.experts}}
                              <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                  {{#if @global.utils.arr.search(.id,
                                  record.experts)}}
                                  <input type="checkbox" class="checked"
                                         name="experts[]" checked value="{{.id}}"
                                         required>
                                  {{else}}
                                  <input type="checkbox" name="experts[]"
                                         value="{{.id}}"> {{/if}}
                                  <span></span>
                                  <div class="checbox__name">
                                    <div class="select__name">{{fullname}}</div>
                                  </div>
                                </label>
                              </div>
                              {{/each}}
                            </div>
                          </div>
                        </div>
                      </div>
                      {{/if}}
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="input input-lk-calendar input--grey">
                              <input class="input__control datepickr" name="event_date"
                                     value="{{ @global.utils.dateForce(record.event_date) }}"
                                     autocomplete="off" type="text"
                                     placeholder="Выбрать дату и время">
                              <div class="input__placeholder">Выбрать дату</div>
                            </div>
                          </div>
                        </div>
                        <div class="row event-time">
                          <div class="col-md-6">
                            <div class="calendar input mb-30">
                              <input class="input__control timepickr event-time-start"
                                     type="text" name="event_time_start"
                                     value="{{record.event_time_start}}"
                                     data-min-time="09:00" data-max-time="21:00"
                                     autocomplete="off" pattern="[0-9]{2}:[0-9]{2}"
                                     required>
                              <div class="input__placeholder">Время (начало)</div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="calendar input mb-30">
                              <input class="input__control timepickr event-time-end"
                                     type="text" name="event_time_end"
                                     value="{{record.event_time_end}}"
                                     data-min-time="09:00" autocomplete="off"
                                     data-max-time="21:00" pattern="[0-9]{2}:[0-9]{2}"
                                     required>
                              <div class="input__placeholder">Время (конец)</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="admin-editor__patient">
                    <div class="mb-10 text-bold">Выбраны услуги</div>

                    <div class="search__drop-item selected-consultation"
                         style="display: {{#if record.consultation }} flex {{else}} none {{/if}};">

                      <div class="search__drop-name consultation-header">
                        <div class="search__drop-delete fake"
                             onclick="unselectConsultation(this);">
                          <svg class="svgsprite _delete">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                          </svg>
                        </div>
                        <span>
													{{@global.catalog.spec_service.consultations[record.type][record.consultation].header}}
												</span>
                      </div>
                      <div class="search__drop-right">
                        <div class="search__drop-summ consultation-price">
                          {{@global.utils.formatPrice(@global.catalog.spec_service.consultations[record.type][record.consultation].price)}}
                          ₽<sup><b>*</b></sup>
                        </div>
                      </div>
                    </div>

                    {{#if record.spec_service}}
                    <div class="search__drop-item">
                      <input type="hidden" name="services[]" value="">
                      <div class="search__drop-name">
                        {{@global.catalog.spec_service[record.spec_service].header}}
                      </div>
                      <div class="search__drop-right">
                        <div class="search__drop-summ">
                          {{@global.catalog.spec_service[this.spec_service].price}} ₽
                        </div>
                      </div>
                    </div>
                    {{else}} {{#each record.service_prices: idx, key}}
                    <div class="search__drop-item selected" data-index="{{idx}}"
                         data-id="{{service_id}}-{{price_id}}" data-service_id="{{service_id}}"
                         data-price="{{price}}">
                      <input type="hidden" name="services[]" value="{{service_id}}">
                      <input type="hidden"
                             name="service_prices[{{service_id}}-{{price_id}}][service_id]"
                             value="{{service_id}}">
                      <input type="hidden"
                             name="service_prices[{{service_id}}-{{price_id}}][price_id]"
                             value="{{price_id}}">
                      <input type="hidden"
                             name="service_prices[{{service_id}}-{{price_id}}][name]"
                             value="{{name}}">
                      <input type="hidden"
                             name="service_prices[{{service_id}}-{{price_id}}][price]"
                             value="{{price}}">
                      <div class="search__drop-name">
                        <div class="search__drop-delete">
                          <svg class="svgsprite _delete">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                          </svg>
                        </div>
                        <div class="search__drop-tags">
                          {{#each
                          @global.catalog.servicePrices[this.service_id+'-'+this.price_id].tags}}
                          <div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
                          {{/each}}
                        </div>
                        {{name}}
                      </div>
                      <label class="search__drop-right">
                        <div class="search__drop-summ">{{ @global.utils.formatPrice(this.price)
                          }} ₽
                        </div>
                      </label>
                    </div>
                    {{/each}}
                    {{/if}}
                  </div>
                  <div class="mb-3 admin-editor__summ">
                    <p>Всего</p>
                    {{#if record.for_consultation == '0'}}
                    <input type="hidden" name="price" value="{{record.price}}">
                    {{elseif record.type == 'online'}}
                    <input type="hidden" name="price" class="consultation" data-type="online"
                           value="{{record.price}}">
                    {{elseif record.type == 'clinic'}}
                    <input type="hidden" name="price" class="consultation" data-type="clinic"
                           value="{{record.price}}">
                    {{else}}
                    <input type="hidden" name="price" value="{{record.price}}">
                    {{/if}}
                    <p class="price">{{ @global.utils.formatPrice(record.price) }}
                      ₽<sup><b>*</b></sup>
                    </p>
                  </div>
                  <div class="mb-4 text-right" data-hide="service-search">
                    <b>*</b>&nbsp;
                    <small>Не является публичной офертой. Cтоимость указана приблизительно и может
                      быть изменена в зависимости от фактически оказанных услуг</small>
                  </div>

                  <button class="btn btn--white" type=submit>Сохранить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupEvent = function (client, _record, onSaved) {
        var saveRecord = function (edit_mode, id, data, _onSaved) {
          utils.api.post('/api/v2/' + (edit_mode ? 'update' : 'create') +
            '/records/' +
            (edit_mode ? id : ''), data)
            .then(function (res) {
              if (!!_onSaved) {
                _onSaved(res);
              }
            });
        };
        return new Ractive({
          el: '.popup.--record-editor',
          template: wbapp.tpl('#popupRecordEditor').html,
          data: {
            client: client,
            record: _record || {},
            'experts': catalog.experts,
            'categories': catalog.categories,
            'services': catalog.services
          },
          on: {
            complete() {
              console.log("_record", _record);
              initServicesSearch($('.search-services'), catalog.servicesList);
              initClientSearch();
              initPlugins($(this.el));
              if (!!$('.select .select__item input:checked').length) {
                $('.select.select_experts .select__item').trigger('click');
              }
              $(this.el).show();
              $('body').addClass('noscroll');
            },
            selectCategory(ev) {
              if ($(ev.node).is(':checked')) {
                //console.log('checked');
              } else {
                //console.log('unchecked');
              }

              var _el = $(ev.node).parents('form').find('.search__input.search-services');

              setTimeout(function () {
                _el.trigger('focus');
                //_el.find('.search-services').trigger('focus');
              }, 200);
            },
            submit(ev) {
              console.log('saving...', ev);
              var edit_mode = (!!_record && !!_record.id);
              let $form = $(ev.node);
              let uid = this.get('client.id');
              if ($form.verify()) {
                let new_data = $form.serializeJSON();
                new_data.group = 'events';
                new_data.price = parseInt(new_data.price);
                if (!edit_mode) {
                  new_data.status = 'upcoming';
                  //new_data.pay_status = new_data.pay_status;
                  console.log(new_data.pay_status);

                  new_data.priority = 0;
                  new_data.marked = false;
                  new_data.photos = {
                    before: [],
                    after: []
                  };
                  new_data.client = new_data.client || uid;

                  if (new_data.group === 'events' && !new_data.client) {
                    toast_error('Необходимо указать пациента!');
                    $($(ev.node).parents('form')).find('.client-search').focus();
                    return false;
                  }
                }

                if (new_data.group === 'events' && !new_data.event_date) {
                  toast_error('Необходимо выбрать дату/время события');
                  $($(ev.node).parents('form')).find('[name="event_date"]')
                    .focus();
                  return false;
                }
                if (new_data.group === 'events' && !new_data.experts) {
                  toast_error('Необходимо выбрать специалиста');
                  $($(ev.node).parents('form'))
                    .find('.select_experts')
                    .focus();
                  return false;
                }
                if (new_data.group === 'events' && !new_data.price) {
                  toast_error('Необходимо выбрать услугу');
                  $($(ev.node).parents('form'))
                    .find('.popup-services-list')
                    .focus();
                  return false;
                }
                new_data.event_date = utils.dateForce(new_data.event_date);
                new_data.price = parseInt(new_data.price);

                console.log('saving...', new_data);

                var is_saved = false;
                if (new_data.type == 'online') {
                  if (new_data.status == 'upcoming') {
                    if (!new_data.meetroom ||
                      !new_data.meetroom.meetingId) {
                      is_saved = true;
                      onlineRooms.create(function (meetroom) {
                        new_data['meetroom'] = meetroom;
                        saveRecord(edit_mode, edit_mode ? _record?.id : null, new_data,
                          onSaved);
                      });
                    } else {
                      is_saved = true;
                      saveRecord(edit_mode, edit_mode ? _record?.id : null, new_data, onSaved);
                    }
                  }
                }

                if (!is_saved) {
                  if (!!new_data.meetroom) {
                    onlineRooms.delete(new_data.meetroom.meetingId, function (meetroom) {
                    });
                    new_data.meetroom = {};
                  }
                  saveRecord(edit_mode, edit_mode ? _record?.id : null, new_data, onSaved);
                }
              }

              return false;
            }
          },
          close() {
            $(this.el).hide();
            $('body').removeClass('noscroll');
          }
        });
      };
    </script>

    <div class="popup --photo">
      <template id="popupPhoto">
        <div class="popup__overlay"></div>

        <div class="popup__wrapper">
          <div class="popup__panel popup__panel-wide">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Добавить фото
              {{#if record.group == 'longterms'}} в продолжительное лечение {{/if}}
            </div>
            <form class="popup__form" on-submit="submit">
              {{#if record}}
              <input type="hidden" name="id" value="{{record.id}}">
              <input type="hidden" name="client" value="{{record.client}}">

              <p class="mb-20 text-bold text-big">
                {{ @global.catalog.clients[record.client].fullname }}
              </p>
              {{else}}
              <div class="search-form input">
                <input class="input__control autocomplete client-search" autocomplete="off" type="text"
                       placeholder="Выбрать пациента" required>
                <div class="input__placeholder">Выбрать пациента</div>
                <div class="client-search search-list" style="position: relative;"></div>
              </div>
              <input type="hidden" name="client" value="">
              <input type="hidden" name="id" value="">

              <div class="search-form event disabled input">
                <input class="input__control autocomplete event-search record-search" type="text"
                       placeholder="Cобытие/продолжительное лечение" required autocomplete="off">
                <div class="input__placeholder">Выбрать событие/продолжительное лечение</div>
                <div class="record-search search-list" style="position: relative;"></div>
              </div>
              {{/if}}

              <div class="mb-20 input calendar">
                <input class="input__control datepickr" type="text" name="date"
                       placeholder="Выбрать дату посещения" autocomplete="off" required>
                <div class="input__placeholder">Укажите дату фото</div>
              </div>
              <div class="popups__text-chexboxs radios --flex" data-show="longterm">
                <label class="text-radio" name="target" value="before" on-click="singlePhoto">
                  <input type="radio" name="target" value="before">
                  <span class="changed_label_before">
										{{#if record.group == 'longterms'}} До начала лечения {{else}} Фото до приема {{/if}}
									</span>
                </label>
                <label class="text-radio switch-blocks" name="target" value="after"
                       on-click="multiplePhoto">
                  <input type="radio" name="target" value="after">
                  <span class="changed_label_after">
										{{#if record.group == 'longterms'}} После начала лечения {{else}} Фото после приема {{/if}}
									</span>
                </label>
              </div>

              <label class="file-photo">
                <div class="file-photo__ico">
                  <svg class="svgsprite _file">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
                  </svg>
                  <img class="preview d-none" alt="upload preview">
                </div>
                <input type="file" name="file" accept=".jpg, .jpeg, .png" class="client-photo" required>
                <input type="hidden" name="path"
                       value="/records/photos/{{ @global.wbapp._session.user.id }}/">
                <div class="file-photo__text text-grey">
                  Для загрузки фото заполните все поля
                  <br> Фото не должно превышать {{ @global.wbapp.settings()['max_upload_size'] / 1024
                  / 1024 / 1000 }} мб
                </div>
              </label>
              <button class="btn btn--white upload-image" type="submit">Сохранить</button>
            </form>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupPhoto = function (client, record, onSaved) {
        return new Ractive({
          el: '.popup.--photo',
          template: wbapp.tpl('#popupPhoto').html,
          data: {
            client: client,
            record: record || {}
          },
          on: {
            complete() {
              initClientSearch();
              initEventSearch($(this.el), true);
              initPlugins($(this.el));
              $('body').addClass('noscroll');
              $(this.el).show();
            },
            multiplePhoto(ev) {
              $(ev.node).parents('form').find('.client-photo').attr('multiple', 'multiple');
            },
            singlePhoto(ev) {
              $(ev.node).parents('form').find('.client-photo').removeAttr('multiple');
            },
            submit(ev) {
              console.log('Submit form...');
              var _form = $(ev.node);
              var self = this;

              wbapp.loading();
              console.log('form data', form_data);
              _form.addClass('disabled');

              if (_form.verify()) {
                var form_data = _form.serializeJSON();
                if (!form_data.client) {
                  toast_error('Необходимо выбрать пациента');
                  $($(ev.node).parents('form')).find('.client-search')
                    .focus();
                  return false;
                }

                if (!form_data.id) {
                  toast_error('Необходимо выбрать посещение');
                  $($(ev.node).parents('form'))
                    .find('.event-search')
                    .focus();
                  return false;
                }
                utils.api.get('/api/v2/read/records/' + form_data.id).then(function (record) {
                  var _photo_group = form_data.target || 'before';
                  delete form_data.target;
                  var files = Array.from(_form.find('input[name="file"]')[0].files);
                  wbapp.loading();
                  files.forEach(function (file) {
                    uploadFile(file,
                      'record/photos/' + record.id,
                      Date.now() + '_' + utils.getRandomStr(4),
                      function (photo) {

                        if (photo.error) {
                          _form.removeClass('disabled');
                          wbapp.unloading();

                          toast_error(photo.error);
                          return false;
                        }
                        console.log('record: ', record, _photo_group);
                        if (!record.photos) {
                          record.photos = {
                            'before': [],
                            'after': []
                          };
                        }
                        var _photo_data = {
                          src: photo.uri,
                          filename: photo.filename,
                          comment: record.comment,
                          date: form_data.date,
                          photo_group: _photo_group
                        };
                        if (_photo_group == 'before') {
                          record.photos['before'] = [];
                        } else if (!record.photos[_photo_group]) {
                          record.photos[_photo_group] = [];
                        }

                        record.hasPhoto = 1;
                        record.photos[_photo_group].push(_photo_data);
                        wbapp.loading();

                        utils.api.post('/api/v2/update/records/' + record.id, {
                          'photos': record.photos,
                          'hasPhoto': 1
                        }).then(function (rec) {
                          wbapp.unloading();
                          _form.removeClass('disabled');
                          $('body').removeClass('noscroll');

                          onSaved(rec);
                          $(self.el).hide();
                        });
                      });
                  });

                });
              } else {
                wbapp.unloading();
                $('body').removeClass('noscroll');
                _form.removeClass('disabled');
              }

              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --longterm">
      <template id="popupLongterm">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">

          <div class="popup__panel popup__panel-wide">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Продолжительное лечение</div>
            <form class="popup__form" on-submit="longtermSave" autocomplete="off">
              {{#if record}}
              <input type="hidden" name="id" value="{{record.id}}">
              {{else}}
              <!-- new record -->
              {{/if}}
              <input type="hidden" name="group" value="longterms">
              <input type="hidden" name="client" value="{{client.id}}"> {{#if client}}
              <p class="mb-20 text-bold text-big">
                {{ @global.catalog.clients[client.id].fullname }}
              </p>
              {{else}}
              <div class="search-form input">
                <input class="input__control autocomplete client-search" autocomplete="off" type="text"
                       placeholder="Выбрать пациента" required>
                <div class="input__placeholder">Выбрать пациента</div>
              </div>
              {{/if}}

              <div class="mb-20 input calendar">
                <input class="input__control datepickr" type="text" required autocomplete="off"
                       name="event_date" value="{{ @global.utils.dateForce(record.event_date) }}"
                       placeholder="Выбрать дату посещения">
                <div class="input__placeholder">Дата посещения</div>
              </div>
              <div class="popup-title__checkbox disabled d-none">
                <label class="mb-20 checkbox show-checkbox" data-show-input="longterm">
                  <input type="checkbox" name="group" value="longterms" checked>
                  <span></span>
                  <div class="checbox__name">Продолжительное лечение</div>
                </label>
              </div>

              <div class="mb-20 input calendar" data-filter="longterms">
                <input class="input__control event-search longterm-search" type="text"
                       name="longterm_title" autocomplete="off"
                       placeholder="Название продолжительного лечения" required>
                <div class="input__placeholder">Название продолжительного лечения</div>
              </div>

              <div class="radios --flex">
                <label class="text-radio">
                  <input type="radio" name="target" value="before" checked="checked">
                  <span>До начала лечения</span>
                </label>
                <label class="text-radio" style="visibility: hidden">
                  <input type="radio" name="target" value="after">
                  <span>После начала лечения</span>
                </label>
              </div>
              <label class="file-photo">
                <div class="file-photo__ico">
                  <svg class="svgsprite _file">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
                  </svg>
                  <img class="preview d-none" alt="upload preview">
                </div>

                <input type="hidden" name="path" value="/records/photos/longterms/">
                <input type="file" accept=".jpg, .jpeg, .png" name="file" class="client-photo" required>

                <div class="file-photo__text text-grey">
                  Для загрузки фото заполните все поля
                  <br> Фото не должно превышать {{ @global.wbapp.settings()['max_upload_size'] / 1024
                  / 1024 / 1000 }} мб
                </div>
              </label>
              <button class="btn btn--white" type="submit">Сохранить</button>
            </form>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupLongterm = function (client, record, onSaved) {
        return new Ractive({
          el: '.popup.--longterm',
          template: wbapp.tpl('#popupLongterm').html,
          data: {
            client: client,
            record: false
          },
          on: {
            complete() {
              initServicesSearch($('.search-services'), catalog.servicesList);
              initPlugins($(this.el));
              $(this.el).show();
              $('body').addClass('noscroll');
            },
            longtermSave(ev) {
              var self = this;
              var $form = $(ev.node);
              var uid = this.get('client.id');

              if ($form.verify() && uid > '') {
                var form_data = $form.serializeJSON();

                form_data.group = 'longterms';
                form_data.status = '';
                form_data.pay_status = 'free';
                form_data.photos = {
                  before: [],
                  after: []
                };

                form_data.client = uid;
                form_data.priority = 0;
                form_data.marked = 0;
                if (!form_data.event_date) {
                  toast_error('Выберите дату и время события');
                  $($(ev.node).parents('form'))
                    .find('[name="event_date"]')
                    .focus();
                  return false;
                }
                form_data.event_date = utils.dateForce(form_data.event_date);
                form_data.recommendation = '';
                form_data.description = '';
                form_data.price = 0;
                var _photo_group = form_data.target || 'before';
                delete form_data.photo_group;
                var files = Array.from($form.find('input[name="file"]')[0].files);
                console.log(files);
                files.forEach(function (file) {
                  uploadFile(
                    file,
                    'records/photos/longterms',
                    Date.now() + '_' + utils.getRandomStr(4),
                    function (photo) {
                      if (photo.error) {
                        toast_error(photo.error);
                        return false;
                      }

                      var _photo_data = {
                        src: photo.uri,
                        filename: photo.filename,
                        date: form_data.event_date,
                        timestamp: utils.timestamp(form_data.event_date),
                        photo_group: _photo_group
                      };
                      form_data.photos[_photo_group].push(_photo_data);
                      form_data.hasPhoto = 1;
                      wbapp.loading();
                      utils.api.post('/api/v2/create/records/', form_data).then(
                        function (longterm_record) {

                          wbapp.unloading();
                          if (typeof onSaved == 'function') {
                            onSaved(longterm_record);
                          }
                          $(self.el).hide();
                          $('body').removeClass('noscroll');
                        });
                    });

                });

              }

              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --create-client">
      <template id="popupCreateClient">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <div class="popup__panel">
            <button class="popup__close" on-click="close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Создать карточку пациента</div>
            <form class="popup__form" on-submit="submit">
              <input type="hidden" name="role" value="client">
              <input type="hidden" name="confirmed" value="0">
              <input type="hidden" name="active" value="on">
              <div class="input">
                <input class="input__control" type="text" required placeholder="ФИО" name="fullname"
                       minlength="5">
                <div class="input__placeholder">ФИО</div>
              </div>
              <div class="input">
                <input class="input__control datebirthdaypickr" required type="text"
                       placeholder="Дата рождения" name="birthdate" minlength="5">
                <div class="input__placeholder">Дата рождения</div>
              </div>
              <div class="input mb-30">
                <input class="input__control intl-tel" type="tel" name="phone" required>
                <div class="input__placeholder active">Номер телефона</div>
              </div>
              <button class="btn btn--black form__submit" type="submit">Создать</button>

              <div class="form-bottom">После отправки для пациента будет создан Личный кабинет, в&nbsp;который
                можно попасть через кнопку &laquo;Войти&raquo;
                в&nbsp;верхнем меню сайта
              </div>
            </form>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupsCreateProfile = function () {
        return new Ractive({
          el: '.popup.--create-client',
          template: wbapp.tpl('#popupCreateClient').html,
          data: {},
          on: {
            complete() {
              initPlugins($(this.el));
              $(this.el).show();
              $('body').addClass('noscroll');
            },
            submit() {
              var form = this.find('.popup__form');
              if ($(form).verify()) {
                var post = $(form).serializeJSON();
                console.log('popupsCreateProfile: ', post);

                let names = post.fullname.split(' ', 3);
                let keys = ['last_name', 'first_name', 'middle_name'];
                for (var i = 0; i < names.length; i++) {
                  post[keys[i]] = names[i];
                }
                post.phone = str_replace([' ', '-', '(', ')'], '', post.phone);
                var _req_phone = str_replace('+', '', post.phone);
                utils.api.get('/api/v2/list/users/?role=client&phone~=' + _req_phone).then(
                  function (data) {
                    if (!data || !data.length) {
                      utils.api.get('/api/v2/list/users/?email=' + post.email).then(
                        function (data) {
                          if (!data.length) {
                            post.role = "client";
                            post.role = "client";
                            post.confirmed = "0";
                            post.active = "on";
                            utils.api.post('/api/v2/create/users/', post)
                              .then(function (data) {
                                if (data) {
                                  if (!!data.error) {
                                    wbapp.trigger('wb-save-error', {
                                      'data': data
                                    });
                                  } else {
                                    $('.popup.--create-client').fadeOut('fast');
                                    $('body').removeClass('noscroll');
                                    popupMessage('Карточка пациента создана!', '',
                                      'Успешно',
                                      '<a href="/cabinet/client/' + data.id +
                                      '"> Перейти на страницу профиля </a>',
                                      function (d) {
                                      });
                                  }
                                } else {
                                  $('.popup.--create-client').fadeOut('fast');
                                  $('body').removeClass('noscroll');
                                  popupMessage('Карточка пациента создана!', '',
                                    'Успешно',
                                    '<a href="/cabinet/client/' + data.id +
                                    '"> Перейти на страницу профиля </a>',
                                    function (d) {
                                    });
                                }
                              });
                          } else {
                            toast('Этот e-mail уже используется!', 'Ошибка!', 'error');
                          }
                        });
                    } else {
                      toast('Этот номер уже используется!', 'Ошибка!', 'error');
                    }
                  });
              }
              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --edit-profile">
      <template id="popupEditProfile">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <div class="popup__panel">
            <button class="popup__close" on-click="close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Редактировать профиль</div>
            <form class="popup__form" on-submit="submit">
              {{#user}}
              <input type="hidden" name="id" value="{{user.id}}">
              <div class="input">
                <input class="input__control" type="text" required value="{{.fullname}}"
                       placeholder="ФИО" name="fullname" minlength="5">
                <div class="input__placeholder">ФИО</div>
              </div>
              <div class="input">
                <input class="input__control datebirthdaypickr" required value="{{.birthdate}}"
                       type="text" placeholder="Дата рождения" name="birthdate" minlength="5">
                <div class="input__placeholder">Дата рождения</div>
              </div>
              <div class="input mb-30">
                <input class="input__control intl-tel" type="tel" required value="{{.phone}}"
                       name="phone">
                <div class="input__placeholder active">Номер телефона</div>
              </div>
              <div class="input input--grey">
                <input class="input__control" type="email" name="email" value="{{.email}}" required
                       placeholder="E-mail">
                <div class="input__placeholder input__placeholder--dark">E-mail</div>
              </div>

              <button class="btn btn--black form__submit" type="submit">Сохранить</button>
              {{/user}}
            </form>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupEditProfile = function () {
        return new Ractive({
          el: '.popup.--edit-profile',
          template: wbapp.tpl('#popupEditProfile').html,
          data: {
            user: wbapp._session.user
          },
          on: {
            complete() {
              var self = this;
              utils.api.get('/api/v2/read/users/' + wbapp._session.user.id + '?active=on')
                .then(function (data) {
                  data.fullname = data.fullname.replaceAll('  ', ' ');
                  data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
                  data.phone = data.phone.includes('+') ? data.phone : '+' + data.phone;

                  self.set('user', data);
                  console.log(data);

                  $(this.el).show();
                });
              initPlugins($(this.el));

              $(this.el).show();
              $('body').addClass('noscroll');
            },
            submit(ev) {
              var self = this;
              var $form = $(ev.node);
              if ($form.verify()) {
                var data = $form.serializeJSON();
                data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
                Cabinet.updateProfile(wbapp._session.user.id, data, function (data) {
                  data.birthdate_fmt = utils.formatDate(data.birthdate);
                  self.set('user', data); /* get actually user data */
                  toast_success('Профиль обновлён!');
                  $(self.el).hide();
                  $('body').removeClass('noscroll');
                });
              }
              return false;
            }
          }
        });
      };
    </script>

    <div class="popup --confirm-sms-code">
      <template id="popupConfirmSmsCode">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">

          <div class="popup__panel">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Вход</div>
            <form class="popup__form">
              <h3 class="h3">Введите код</h3>
              <div class="form-title__description">
                Мы отправили код подтверждения на номер
                <span class="current_phone">{{phone}}</span>
                .
                <br> Время жизни кода 30 секунд.
                <br> Осталось
                <strong>
                  <span class="sms_code_lifetime"></span>
                </strong>
              </div>

              <div class="code">
                <input class="code__input" on-keyup="keyup" type="text">
                <input class="code__input" on-keyup="keyup" type="text">
                <input class="code__input" on-keyup="keyup" type="text">
                <input class="code__input" on-keyup="keyup" type="text">
                <input class="code__input" on-keyup="keyup" type="text">
                <input class="code__input" on-keyup="keyup" type="text">
              </div>

              <div class="mb-2 alert alert-warning"></div>
            </form>
          </div>
        </div>
      </template>
    </div>

    <div class="popup --download-data">
      <template id="popupDownloadData">
        <div class="popup__overlay"></div>
        <div class="popup__wrapper">
          <div class="popup__panel">
            <button class="popup__close">
              <svg class="svgsprite _close">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
              </svg>
            </button>
            <div class="popup__name text-bold">Выгрузить данные</div>

            <form class="popup__form" method="GET" action="/form/records/download" on-submit="submit">
              <div class="select-form">
                <div class="select">
                  <div class="select__main">
                    <div class="select__placeholder">Все услуги</div>
                    <div class="select__values"></div>
                  </div>
                  <div class="select__list">
                    {{#each catalog.services}}
                    <div class="select__item select__item--checkbox">
                      <label class="checkbox checkbox--record">
                        <input type="checkbox" name="services[]" value="{{this.id}}">
                        <span></span>
                        <div class="checbox__name">
                          <div class="select__name">{{this.header}}</div>
                        </div>
                      </label>
                    </div>
                    {{/each}}
                  </div>
                </div>
              </div>
              <div class="select-form">
                <div class="select">
                  <div class="select__main">
                    <div class="select__placeholder">Выберите специалиста</div>
                    <div class="select__values"></div>
                  </div>
                  <div class="select__list">
                    {{#each catalog.experts}}
                    <div class="select__item select__item--checkbox">
                      <label class="checkbox checkbox--record">
                        <input type="checkbox" name="experts[]" value="{{this.id}}">
                        <span></span>
                        <div class="checbox__name">
                          <div class="select__name">{{this.fullname}}</div>
                        </div>
                      </label>
                    </div>
                    {{/each}}
                  </div>
                </div>
              </div>
              <div class="select-form">
                <div class="select">

                  <div class="select__main">
                    <div class="select__placeholder">Все администраторы</div>
                    <div class="select__values"></div>
                  </div>
                  <div class="select__list">
                    {{#each @global.catalog.admins}}
                    <div class="select__item select__item--checkbox">
                      <label class="checkbox checkbox--record">
                        <input type="checkbox" name="admins[]" value="{{this.id}}">
                        <span></span>
                        <div class="checbox__name">
                          <div class="select__name">{{this.fullname}}</div>
                        </div>
                      </label>
                    </div>
                    {{/each}}
                  </div>
                </div>
              </div>
              <div class="calendar input">
                <input class="input__control daterangepickr" type="text" name="period"
                       placeholder="За весь период">
                <div class="input__placeholder">За весь период</div>
              </div>
              <div class="select-form">
                <label class="mb-10 checkbox mainfilter__checkbox">
                  <input type="checkbox" name="only_phones">
                  <span></span>
                  <div class="checbox__name text-grey">Выгрузить только список номеров</div>
                </label>
                <div class="calendar input">
                  <input class="input__control" type="tel" name="phone" placeholder="Номер телефона">
                  <div class="input__placeholder">Номер телефона</div>
                </div>
              </div>
              <div class="select-form mb-30">
                <label class="mb-10 checkbox mainfilter__checkbox">
                  <input type="checkbox" name="only_emails">
                  <span></span>
                  <div class="checbox__name text-grey">Введите только список е-мейлов</div>
                </label>
                <div class="calendar input">
                  <input class="input__control" type="email" name="email"
                         placeholder="Введите е-мейл">
                  <div class="input__placeholder">Введите е-мейл</div>
                </div>
              </div>
              <button type="submit" class="btn btn--black">Скачать</button>
            </form>
          </div>
        </div>
      </template>
    </div>
    <script wbapp>
      window.popupDownloadData = function () {
        return new Ractive({
          el: '.popup.--download-data',
          template: wbapp.tpl('#popupDownloadData').html,
          data: {
            catalog: catalog,
            admins: catalog.admins
          },
          on: {
            complete() {
              initPlugins($(this.el));
              $(this.el).show();
              $('body').addClass('noscroll');
            },
            submit(ev) {
              let form = ev.node;
              let data = $(form).serializeJSON();
              let action = $(form).attr('action');

              /*
							 $.post(action,data,function(res){
							 console.log(res);
							 })
							 return false;
							 */
              $('body').removeClass('noscroll');

              var xhr = new XMLHttpRequest();
              xhr.open('POST', action, true);
              xhr.responseType = 'blob';
              xhr.onload = function () {
                if (this.status === 200) {
                  var blob = this.response;
                  var filename = "";
                  var disposition = xhr.getResponseHeader('Content-Disposition');
                  if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                  }

                  if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                  } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                      // use HTML5 a[download] attribute to specify filename
                      var a = document.createElement("a");
                      // safari doesn't support this yet
                      if (typeof a.download === 'undefined') {
                        window.location.href = downloadUrl;
                      } else {
                        a.href = downloadUrl;
                        a.download = filename;
                        document.body.appendChild(a);
                        a.click();
                      }
                    } else {
                      window.location.href = downloadUrl;
                    }

                    setTimeout(function () {
                      URL.revokeObjectURL(downloadUrl);
                    }, 100); // cleanup
                  }
                }
              };
              xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xhr.send($.param(data, true));
              return false;

            }
          }
        });
      };
    </script>

    <div class='popup --record-edit'>
      <template id='popupRecordEdit'>
        <div class='popup__overlay'></div>
        <div class='popup__wrapper'>
          <div class='popup__panel popup__panel-wide'>
            <button class='popup__close'>
              <svg class='svgsprite _close'>
                <use xlink:href='/assets/img/sprites/svgsprites.svg#close'></use>
              </svg>
            </button>
            <div class='popup__name text-bold'>{{title}}</div>

            <form class='popup__form' on-submit='submit' data-record='{{record.id}}'>
              <p class='mb-20 text-bold text-big'>{{client.fullname}}</p>


              <input type='hidden' value='{{ record.id }}' name='id'> {{#if this.spec_service}}
              <input type='hidden' name='spec_service' value='{{this.spec_service}}'>
              <input type='hidden' name='title'
                     value='{{catalog.spec_service[this.spec_service].header}}'>
              {{else}}
              <div class='mb-20 admin-editor__event'>
                <div class='search__block --flex --aicn'>
                  <div class='input'>
                    <input class='popup-services-list search__input search-services' type='text'
                           placeholder='Поиск по услугам' autocomplete='off'>
                    <div class='search__drop'></div>
                    <button class='search__btn' type='button'>
                      <svg class='svgsprite _search'>
                        <use xlink:href='/assets/img/sprites/svgsprites.svg#search'></use>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class='mb-20 admin-editor__event'>
                <!-- services-select.dropdown -->
              </div>
              {{/if}}

              <div class='admin-editor__type-event'>
                <div class='mb-20 consultations'>
                  <label class='checkbox checkbox--record show-checkbox'
                         data-show-input='consultation-type'>
                    <input type='hidden' name='for_consultation' value='0'>

                    {{#if record.for_consultation === '1' }}
                    <input class='checkbox-visible-next-form' type='checkbox' checked
                           name='for_consultation' value='1'>
                    {{else}}
                    <input class='checkbox-visible-next-form' type='checkbox'
                           name='for_consultation' value='1'>
                    {{/if}}
                    <span></span>
                    <div class='checbox__name'>Консультация врача</div>
                  </label>
                  <div class='select-form' data-show='consultation-type'
                       style="display: {{#if record.for_consultation === '1' }} block {{else}} none {{/if}};">
                    <div class='mb-10 text-bold'>Тип события</div>
                    <div class='popups__text-chexboxs'>
                      {{#each @global.catalog.quoteType as qt}}
                      <label class='text-radio show-checkbox'
                             data-show-input='consultation-{{ qt.id }}'>
                        {{#if qt.id === record.type }}
                        <input type='radio' name='type' class='consultation-type {{qt.id}}'
                               value='{{ qt.id }}' checked>
                        {{else}}
                        <input type='radio' name='type' value='{{ qt.id }}'
                               class='consultation-type {{qt.id}}'>
                        {{/if}}
                        <span>{{qt.name}}</span>
                      </label>
                      {{/each}}
                    </div>
                    <div class='admin-editor__patient price-list'>
                      {{#each @global.catalog.spec_service.consultations.online}}
                      <div
                        class='search__drop-item consultation online {{#if record.consultation == this.id }}selected{{/if}}'
                        data-show='consultation-online' data-consultation='{{this.id}}'
                        data-price='{{this.price}}'
                        style="display: {{#if record.type === 'online' }} flex {{else}} none {{/if}};">

                        <label class='checkbox search__drop-name' data-name='{{this.header}}'
                               data-price='{{this.price}}' data-id='{{this.id}}'>
                          {{#if record.consultation == this.id }}
                          <input type='radio' name='consultation' value='{{this.id}}'
                                 data-name='{{this.header}}' data-price='{{this.price}}'
                                 checked='checked'>
                          {{else}}
                          <input type='radio' name='consultation' value='{{this.id}}'
                                 data-name='{{this.header}}' data-price='{{this.price}}'>
                          {{/if}}
                          <span></span>
                          <div class='checbox__name'>{{this.header}}</div>
                        </label>
                        <label class='search__drop-right'>
                          <div class='search__drop-summ'>{{
                            @global.utils.formatPrice(this.price) }} ₽
                          </div>
                        </label>
                      </div>
                      {{/each}}
                      {{#each @global.catalog.spec_service.consultations.clinic}}
                      <div
                        class='search__drop-item consultation clinic {{#if record.consultation == this.id }}selected{{/if}}'
                        data-show='consultation-clinic' data-consultation='{{this.id}}'
                        data-price='{{this.price}}'
                        style="display: {{#if record.type === 'clinic' }} flex {{else}} none {{/if}};">
                        <label class='checkbox search__drop-name' data-name='{{this.header}}'
                               data-price='{{this.price}}' data-id='{{this.id}}'>
                          {{#if record.consultation == this.id }}
                          <input type='radio' name='consultation' value='{{this.id}}'
                                 data-name='{{this.header}}' data-price='{{this.price}}'
                                 checked='checked'>
                          {{else}}
                          <input type='radio' name='consultation' value='{{this.id}}'
                                 data-name='{{this.header}}' data-price='{{this.price}}'>
                          {{/if}}
                          <span></span>
                          <div class='checbox__name'>{{this.header}}</div>
                        </label>
                        <label class='search__drop-right'>
                          <div class='search__drop-summ'>{{
                            @global.utils.formatPrice(this.price) }} ₽
                          </div>
                        </label>
                      </div>
                      {{/each}}
                    </div>
                  </div>
                  <input type='hidden' class='consultation_price' name='consultation_price'
                         value='{{record.consultation_price}}'>
                </div>
                <div class='row'>
                  {{#if record.spec_service}} {{else}}
                  <div class='col-md-6'>
                    <div class='select-form select-checkboxes'>
                      <div class='select select_experts'>
                        <div class='select__main'>
                          <div class='select__placeholder'>Выберите специалиста</div>
                          <div class='select__values'></div>
                        </div>
                        <div class='select__list single'>
                          {{#each @global.catalog.experts}}
                          <div class='select__item select__item--checkbox'>
                            <label class='checkbox checkbox--record'>
                              {{#if @global.utils.arr.search(.id, record.experts)}}
                              <input type='checkbox' class='checked' name='experts[]'
                                     checked value='{{.id}}'>
                              {{else}}
                              <input type='checkbox' name='experts[]' value='{{.id}}'>
                              {{/if}}
                              <span></span>
                              <div class='checbox__name'>
                                <div class='select__name'>{{fullname}}</div>
                              </div>
                            </label>
                          </div>
                          {{/each}}
                        </div>
                      </div>
                    </div>
                  </div>
                  {{/if}}
                  <div class='col-md-6'>
                    <div class='row'>
                      <div class='col-md-12'>
                        <div class='input input-lk-calendar input--grey'>
                          <input class='input__control datepickr' name='event_date'
                                 value='{{ @global.utils.dateForce(record.event_date) }}'
                                 type='text' placeholder='Выбрать дату и время'>
                          <div class='input__placeholder'>Выбрать дату</div>
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class='col-md-6'>
                        <div class='calendar input mb-30'>
                          <input class='input__control timepickr' type='text'
                                 name='event_time_start' value='{{record.event_time_start}}'
                                 data-min-time='09:00' data-max-time='21:00'
                                 pattern='[0-9]{2}:[0-9]{2}' required>
                          <div class='input__placeholder'>Время (начало)</div>
                        </div>
                      </div>
                      <div class='col-md-6'>
                        <div class='calendar input mb-30'>
                          <input class='input__control timepickr' type='text'
                                 name='event_time_end' value='{{record.event_time_end}}'
                                 data-min-time='09:00' data-max-time='21:00'
                                 pattern='[0-9]{2}:[0-9]{2}' required>
                          <div class='input__placeholder'>Время (конец)</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class='admin-editor__patient'>
                <div class='mb-10 text-bold'>Выбраны услуги</div>

                <div class='search__drop-item selected-consultation'
                     style='display: {{#if record.consultation }} flex {{else}} none {{/if}};'>

                  <div class='search__drop-name consultation-header'>
                    <div class='search__drop-delete fake' onclick='unselectConsultation(this);'>
                      <svg class='svgsprite _delete'>
                        <use xlink:href='/assets/img/sprites/svgsprites.svg#delete'></use>
                      </svg>
                    </div>
                    <span>
											{{@global.catalog.spec_service.consultations[record.type][record.consultation].header}}
										</span>
                  </div>
                  <div class='search__drop-right'>
                    <div class='search__drop-summ consultation-price'>
                      {{@global.utils.formatPrice(@global.catalog.spec_service.consultations[record.type][record.consultation].price)}}
                      ₽<sup><b>*</b></sup>
                    </div>
                  </div>
                </div>

                {{#each record.service_prices: idx, key}}
                <div class='search__drop-item selected' data-index='{{idx}}'
                     data-id='{{service_id}}-{{price_id}}' data-service_id='{{service_id}}'
                     data-price='{{price}}'>
                  <input type='hidden' name='services[]' value='{{service_id}}'>
                  <input type='hidden' name='service_prices[{{service_id}}-{{price_id}}][service_id]'
                         value='{{service_id}}'>
                  <input type='hidden' name='service_prices[{{service_id}}-{{price_id}}][price_id]'
                         value='{{price_id}}'>
                  <input type='hidden' name='service_prices[{{service_id}}-{{price_id}}][name]'
                         value='{{name}}'>
                  <input type='hidden' name='service_prices[{{service_id}}-{{price_id}}][price]'
                         value='{{price}}'>
                  <div class='search__drop-name'>
                    <div class='search__drop-delete'>
                      <svg class='svgsprite _delete'>
                        <use xlink:href='/assets/img/sprites/svgsprites.svg#delete'></use>
                      </svg>
                    </div>
                    <div class='search__drop-tags'>
                      {{#each
                      @global.catalog.servicePrices[this.service_id+'-'+this.price_id].tags}}
                      <div class='search__drop-tag --{{.color}}'>{{this.tag}}</div>
                      {{/each}}
                    </div>
                    {{name}}
                  </div>
                  <label class='search__drop-right'>
                    <div class='search__drop-summ'>{{ @global.utils.formatPrice(this.price) }} ₽
                    </div>
                  </label>
                </div>
                {{/each}}
              </div>
              <div class='admin-editor__summ'>
                <p>Всего</p>
                <input type='hidden' name='price' value='{{record.price}}'>
                <p class='price'>{{ @global.utils.formatPrice(record.price) }} ₽</p>
              </div>

              <input type='hidden' name='client' value='{{this.client}}'>
              <input type='hidden' name='group' value='events'>
              <input type='hidden' name='status' value='upcoming'>
              <input type='hidden' name='pay_status' value='unpay'>

              <button class='btn btn--black' type='submit'>Продолжить</button>
            </form>
          </div>
        </div>
      </template>
    </div>

    <div class='popup --photo-profile'>
      <template id='popupPhotoProfile'>
        <div class='popup__overlay'></div>
        <div class='popup__wrapper'>
          <div class='popup__panel'>
            <button class='popup__close'>
              <svg class='svgsprite _close'>
                <use xlink:href='/assets/img/sprites/svgsprites.svg#close'></use>
              </svg>
            </button>
            <div class='popup__name text-bold'>Добавить фото</div>
            <div class='popup__form'>
              <input type='hidden' name='client' value='{{this.client}}'>
              <input type='hidden' name='id' value='{{this.id}}'>

              <div class='search-form input disabled'>
                <input class='input__control autocomplete client-search' type='text'
                       placeholder='Выбрать пациента'>
                <div class='input__placeholder'>Выбрать пациента</div>
              </div>
              <div class='mb-20 input calendar'>
                <input class='input__control datepickr' type='text' name='event_date'
                       placeholder='Выбрать дату посещения'>
                <div class='input__placeholder'>Выбрать дату посещения</div>
              </div>
              <input type='hidden' name='group' value='event'>
              <input type='hidden' name='id'>
              <div class='popup-title__checkbox'>
                <label class='mb-20 checkbox show-checkbox' data-show-input='longterm'>
                  <input type='checkbox' name='group' value='longterm' checked>
                  <span></span>
                  <div class='checbox__name'>Продолжительное лечение</div>
                </label>
              </div>
              <div class='mb-20 input calendar' data-show='longterm'>
                <input class='input__control longterm-search' type='text' name='title'
                       placeholder='Название продолжительного лечения' value=''>
                <div class='input__placeholder'>Название продолжительного лечения</div>
              </div>
              <div class='radios --flex'>
                <label class='text-radio'>
                  <input type='radio' name='target' value='before' checked='checked'>
                  <span>До начала лечения</span>
                </label>
                <label class='text-radio disabled'>
                  <input type='radio' name='target' value='after'>
                  <span>В процессе лечения</span>
                </label>
              </div>

              <label class='file-photo' for='file-photo'>
                <input type='hidden' name='path' value='/records/'>
                <div class='file-photo__ico'>
                  <svg class='svgsprite _file'>
                    <use xlink:href='assets/img/sprites/svgsprites.svg#file'></use>
                  </svg>
                  <img class='preview d-none' alt='upload preview'>
                </div>
                <input type='file' id='file-photo' name='file'>
                <div class='file-photo__text text-grey'>Для загрузки фото заполните все поля
                  <br>Фото не должно превышать 10 мб
                </div>
              </label>
              <button class='btn btn--white'>Сохранить</button>
            </div>
          </div>
        </div>
      </template>
    </div>

  </div>
</view>
<edit header="Все попапы для ЛК">
  <div>
    <wb-module wb="module=yonger&mode=edit&block=common.inc"/>
  </div>
</edit>
