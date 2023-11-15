<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
  <title seo>Часто задаваемые вопросы</title>
  <link rel="icon" href="/favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="/assets/css/listnav.css?v=2">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container lk-main" data-scroll-container>
  <div>
    <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
  </div>
  <main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="lk-cabinet">
    <div class="account admin">
      <div class="container">
        <div class="crumbs">
          <a class="crumbs__arrow" href="#">
            <svg class="svgsprite _crumbs-back">
              <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
            </svg>
          </a>
          <a class="crumbs__link" href="/">Главная</a>
          <a class="crumbs__link" href="/search">Часто задаваемые впоросы</a>
        </div>
        <div class="title-flex --flex --jcsb">
          <div class="title">
            <h1 class="mb-10 h1">Часто задаваемые впоросы</h1>
          </div>
        </div>
        {{_route}}
        <div class="questions-main">
          <div class="dropdown" data-level="main">
            <div class="dropdown-head">
              <span>Сайт</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7" viewBox="0 0 14 7" fill="none">
                <path
                  d="M14.0013 5.83798C14.0018 5.68858 13.9688 5.54097 13.9048 5.40599C13.8407 5.27101 13.7473 5.1521 13.6313 5.05798L7.63125 0.227977C7.45232 0.0808949 7.22788 0.000488597 6.99625 0.000488587C6.76463 0.000488577 6.54018 0.0808948 6.36125 0.227977L0.361252 5.22798C0.157035 5.39772 0.028611 5.64163 0.00423124 5.90605C-0.0201485 6.17048 0.0615134 6.43376 0.231252 6.63798C0.40099 6.84219 0.644902 6.97062 0.909328 6.995C1.17375 7.01938 1.43704 6.93772 1.64125 6.76798L7.00125 2.29798L12.3613 6.61798C12.508 6.74026 12.6868 6.81794 12.8763 6.84182C13.0659 6.8657 13.2583 6.83478 13.4308 6.75272C13.6034 6.67067 13.7488 6.54091 13.8499 6.3788C13.9509 6.21669 14.0035 6.02901 14.0013 5.83798Z"
                  fill="#080E0D"/>
              </svg>
            </div>
            <div class="dropdown-body dropdown-body--list">
              <div class="dropdown" data-level="sub">
                <div class="dropdown-head">
                  <span>Сайт</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                    <g clip-path="url(#clip0_3912_6080)">
                      <line x1="15.3555" y1="1.41406" x2="15.3555" y2="26.8699" stroke="#363838"/>
                      <line y1="-0.5" x2="25.4558" y2="-0.5" transform="matrix(1 0 0 -1 2.12891 14.1421)"
                            stroke="#363838"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_3912_6080">
                        <rect width="20" height="20" fill="white" transform="translate(0.714844 14.1421) rotate(-45)"/>
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                <div class="dropdown-body">
                  Для того чтобы подтвердить запись на консультацию к нашим специалистам необходимо внести предоплату в размере 20%  (100% для онлайн консультаций) от стоимости консультации.
                  <img src="https://www.figma.com/e1c00a6a-f122-4d16-aa35-2a41e59b30e6" alt="">
                </div>
              </div>
              <div class="dropdown" data-level="sub">
                <div class="dropdown-head">
                  <span>Сайт</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                    <g clip-path="url(#clip0_3912_6080)">
                      <line x1="15.3555" y1="1.41406" x2="15.3555" y2="26.8699" stroke="#363838"/>
                      <line y1="-0.5" x2="25.4558" y2="-0.5" transform="matrix(1 0 0 -1 2.12891 14.1421)"
                            stroke="#363838"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_3912_6080">
                        <rect width="20" height="20" fill="white" transform="translate(0.714844 14.1421) rotate(-45)"/>
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                <div class="dropdown-body">
                  Для того чтобы подтвердить запись на консультацию к нашим специалистам необходимо внести предоплату в размере 20%  (100% для онлайн консультаций) от стоимости консультации.
                  <img src="https://www.figma.com/e1c00a6a-f122-4d16-aa35-2a41e59b30e6" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        // document.addEventListener("DOMContentLoaded", function () {
          const dropdownHeads = document.querySelectorAll('.dropdown-head');
          console.log(dropdownHeads)
          const dropdowns = document.querySelectorAll('.dropdown');

          dropdownHeads.forEach(function (head) {
            head.addEventListener("click", function () {
              console.log("head", this)
              const dropdown = this.closest(".dropdown");
							const body = dropdown.querySelector(".dropdown-body");

							dropdown.classList.toggle("active");

							if (dropdown.className.includes("active")) {
								body.style.maxHeight = body.scrollHeight + "px";

                if (dropdown.dataset.level === "sub") {
                  const parent = dropdown.closest(".dropdown[data-level='main']")
                  const parentBody = parent.querySelector(".dropdown-body");
                  console.log("parent", parent)
                  console.log(parentBody.offsetHeight + body.scrollHeight + "px");
                  parentBody.style.maxHeight = parentBody.offsetHeight + body.scrollHeight + "px";
                }

								dropdowns.forEach(wrap => {
                  if (wrap === dropdown) return;
                  if (wrap.dataset.level !== dropdown.dataset.level) return;

									wrap.classList.remove("active");

									const body = wrap.querySelector(".dropdown-body");

									body.style.maxHeight = 0 + "px";
								})
							} else {
								body.style.maxHeight = 0 + "px";
							}
            })
          })
        // })
      </script>
  </main>


</div>

<div>
  <wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>