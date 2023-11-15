<edit header="Свайпер и ссылки">
  <div>
    <wb-module wb="module=yonger&mode=edit&block=common.inc" />
  </div>
  <wb-multiinput name="swiper">
    <div class="pl-3 col-sm-12">
      <div class="form-group row">
        <div class="col-sm-12">
          <input name="title" class="form-control tx-bold" placeholder="Заголовок сецкции">
        </div>
      </div>
      <wb-multiinput name="subswiper">
        <div class="pl-3 col-sm-12">
          <div class="form-group row">
            <div class="col-sm-12">
              <input name="subtitle" class="form-control tx-bold" placeholder="Заголовок подсекции">
            </div>
            <div class="col-sm-12">
              <label>Контент подсекции</label>
              <input name="subtext" wb="module=ckeditor">
            </div>
          </div>
        </div>
      </wb-multiinput
    </div>
  </wb-multiinput>
</edit>


<view>
	<div class="container">
		<div class="questions-main">
      <wb-foreach wb="from=swiper">
        <div class="dropdown" data-level="main">
          <div class="dropdown-head">
            <span>{{title}}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7" viewBox="0 0 14 7" fill="none">
              <path
                d="M14.0013 5.83798C14.0018 5.68858 13.9688 5.54097 13.9048 5.40599C13.8407 5.27101 13.7473 5.1521 13.6313 5.05798L7.63125 0.227977C7.45232 0.0808949 7.22788 0.000488597 6.99625 0.000488587C6.76463 0.000488577 6.54018 0.0808948 6.36125 0.227977L0.361252 5.22798C0.157035 5.39772 0.028611 5.64163 0.00423124 5.90605C-0.0201485 6.17048 0.0615134 6.43376 0.231252 6.63798C0.40099 6.84219 0.644902 6.97062 0.909328 6.995C1.17375 7.01938 1.43704 6.93772 1.64125 6.76798L7.00125 2.29798L12.3613 6.61798C12.508 6.74026 12.6868 6.81794 12.8763 6.84182C13.0659 6.8657 13.2583 6.83478 13.4308 6.75272C13.6034 6.67067 13.7488 6.54091 13.8499 6.3788C13.9509 6.21669 14.0035 6.02901 14.0013 5.83798Z"
                fill="#080E0D"/>
            </svg>
          </div>
          <div class="dropdown-body dropdown-body--list">
            <wb-foreach wb="from=subswiper">
              <div class="dropdown" data-level="sub">
                <div class="dropdown-head">
                  <span>{{subtitle}}</span>
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
                  {{subtext}}
                </div>
              </div>
            </wb-foreach>
          </div>
        </div>
      </wb-foreach>
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
	</div>
</view>

<edit header="Часто задаваемые вопросы">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>
