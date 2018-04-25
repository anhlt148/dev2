<!-- <div role="container" class="container"> -->  
  <div class="main">
    <div class="hero_widget">
      <div id="hero" class="wrapper_large">
        <form id="form" role="form" data-type="json" novalidate="novalidate" action="/applications" accept-charset="UTF-8" data-remote="true" method="post" class="simple_form form_float">
          <input name="utf8" type="hidden" value="✓">
          <div class="hero_widget__title">Giải pháp tài chính trong vòng 24 giờ</div>
          <div class="hero_widget__body">
            <div class="row">
              <div class="col-xs-12 col-md-9">
                <div class="col-xs-12 col-md-7">
                  <div class="hero_widget__calculation">
                    <div class="hero_widget__sliders">
                      <div class="sliders sliders-top"><a role="sliderAmountMinus" href="#" class="sliders__minus">–</a><a role="sliderAmountPlus" href="#" class="sliders__plus">+</a><span class="sliders__title">Tôi cần vay <strong role="needAmount" class="sliders__value">2.000.000 </strong>VND</span>
                        <input id="application_amount" role="amountSlider" data-slider-value="2000000" data-min="0" data-max="100" type="hidden" value="2000000" name="application[amount]">
                        <input id="application_credit_limit_slider_move" role="amountSliderMove" type="hidden" name="application[credit_limit_slider_move]">
                        <input id="application_credit_limit_slider_move_to_repeat" role="amountSliderMoveToRepeat" type="hidden" name="application[credit_limit_slider_move_to_repeat]">
                      </div>
                      <div role="creditLimitation" class="credit_limitation"></div>
                      <div class="sliders"><a role="sliderTermMinus" href="#" class="sliders__minus">–</a><a role="sliderTermPlus" href="#" class="sliders__plus">+</a><span class="sliders__title">trong <strong role="forTerms" class="sliders__value">30 </strong> ngày</span>
                        <input id="application_term" role="termSlider" data-slider-value="30" type="hidden" value="30" name="application[term]">
                        <input id="application_credit_term_slider_move" role="termSliderMove" type="hidden" name="application[credit_term_slider_move]">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-5">
                  <div class="hero_widget__form">
                    <div role="formFloatGroup" class="form_float__group hidden application_ga_client_id">
                      <input id="application_ga_client_id" type="hidden" name="application[ga_client_id]" class="hidden form_float__input">
                    </div>
                    <div role="formFloatGroup" class="form_float__group form_float__input_wrapper string required application_full_name">
                      <input id="application_full_name" placeholder="Nguyễn Thu Giang" type="text" name="application[full_name]" class="string required form_float__input">
                      <label for="application_full_name" class="string required form_float__label"><abbr title="required">*</abbr> Họ và tên</label>
                    </div>
                    <div role="formFloatGroup" class="form_float__group form_float__input_wrapper tel optional application_mobile_phone">
                      <input id="application_mobile_phone" role="phone" placeholder="0 123 456 78 90" type="tel" name="application[mobile_phone]" class="string tel optional form_float__input">
                      <label for="application_mobile_phone" class="tel optional form_float__label">Số điện thoại đang sử dụng</label>
                    </div>
                    <div class="form_float__btn">
                      <input type="submit" name="commit" value="VAY NGAY" role="takeMoneyMain" data-disable-with="Xin vui lòng chờ" class="btn btn-primary btn btn-primary btn-lg btn-block btn-calc btn-mob">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-12">
                  <div class="hero_widget__calc">
                    <div class="hero_widget__calc__item">
                      <div class="hero_widget__calc__item__name">Khoản vay</div>
                      <div class="hero_widget__calc__item__value"><span role="calcAmount">2.000.000 </span>VND</div>
                    </div>
                    <div class="hero_widget__calc__item">
                      <div class="hero_widget__calc__item__name">Ngày thanh toán</div>
                      <div class="hero_widget__calc__item__value"><span role="paymentDueDateLabel"></span></div>
                    </div>
                    <div role="totalValue" class="hero_widget__calc__item">
                      <div class="hero_widget__calc__item__name">Tổng số tiền thanh toán</div>
                      <div class="hero_widget__calc__item__value"><span role="calcTotal"></span>VND</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-3">
                <div class="hero_baner">
                  <div class="hero_baner__wrapper">
                    <div class="hero_baner__content">
                      <div class="hero_baner__title">Vay số tiền lớn hơn</div>
                      <div class="hero_baner__subtitle">nếu bạn đã là khách hàng!</div>
                      <p class="hero_baner__desc">Chỉ cần nhấn "Đăng ký Vay lại" và</p>
                      <p class="hero_baner__desc">làm theo hướng dẫn. Hồ sơ của bạn sẽ được duyệt ngay!</p>
                    </div>
                  </div><a data-modal="true" role="bannerMain" data-remote="true" href="/clients/auth/sign_in" class="hero_baner__btn">Đăng ký Vay lại</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="hero_widget__loans">Khách hàng đã đăng ký
                <div class="hero_widget__loans_counter"><span class="counter">1</span><span class="counter">0</span><span class="counter">6</span><span class="counter">8</span><span class="counter">0</span><span class="counter">7</span><span class="counter">1</span></div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="wrapper">
      <div class="steps_represent">
        <div class="steps_represent__title">4 bước đơn giản để nhận và thanh toán khoản vay</div>
        <div class="steps_represent__list">
          <div class="steps_represent__item steps_represent__item-notebook"><strong class="steps_represent__name"><a href="#form" class="steps_represent__apply">Đăng ký</a> vay</strong><span class="steps_represent__desc">Hoàn tất điền thông tin trong 5 phút</span></div>
          <div class="steps_represent__item steps_represent__item-document"><strong class="steps_represent__name">Nhận xét duyệt</strong><span class="steps_represent__desc">Nhận kết quả nhanh chóng sau khi gửi hồ sơ</span></div>
          <div class="steps_represent__item steps_represent__item-money"><strong class="steps_represent__name">Nhận khoản vay</strong><span class="steps_represent__desc">Nhận tiền qua tài khoản ngân hàng hoặc tại điểm giao dịch của đối tác toàn quốc</span></div>
          <div class="steps_represent__item steps_represent__item-rapay"><strong class="steps_represent__name">Thanh toán khoản vay</strong><span class="steps_represent__desc">Thanh toán khoản vay vào cuối kỳ hạn tại bất kỳ điểm giao dịch của đối tác</span></div>
        </div>
      </div>
    </div>
    <div class="background-gray background-gray_half">
      <div class="wrapper">
        <div class="row">
          <div class="col-md-6">
            <div class="target_group">
              <div class="target_group__title">Ai có thể sử dụng Doctor Đồng?</div>
              <div class="target_group__list">
                <div class="target_group__item target_group__item-age"><strong class="target_group__name">Tuổi</strong><span class="target_group__desc">22 - 60</span></div>
                <div class="target_group__item target_group__item-location"><strong class="target_group__name">Tỉnh thành</strong><span class="target_group__desc">Toàn quốc (trừ Hải Phòng và các huyện đảo)</span></div>
                <div class="target_group__item target_group__item-occupation"><strong class="target_group__name">Nghề nghiệp</strong><span class="target_group__desc">Người có thu nhập ổn định</span></div>
              </div>
              <div class="target_group__action"><a data-scrollto="@form" href="#hero" class="btn btn-success-outline btn-lg scrolltoelem">Đăng ký vay</a></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="required_docs">
              <div class="required_docs__title">Chỉ cần CMND bản gốc</div>
              <div class="required_docs__list">
                <div class="required_docs__item"></div><span class="required_docs__desc">Có thể yêu cầu bổ sung chứng minh tài chính</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="why_us">
      <div class="wrapper">
        <div class="why_us__title">Vì sao chọn Doctor Đồng</div>
        <div class="why_us__list">
          <div class="why_us__item why_us__item-costs"><span class="why_us__subtitle">Chi phí minh bạch</span><span class="why_us__desc">Mọi chi phí hiển thị rõ ràng trước khi vay</span></div>
          <div class="why_us__item why_us__item-notebook"><span class="why_us__subtitle">Thủ tục đơn giản</span><span class="why_us__desc">Tối giản mọi hồ sơ, chỉ cần CMND để đăng ký nhận khoản vay</span></div>
        </div>
        <div class="why_us__list">
          <div class="why_us__item why_us__item-procedures"><span class="why_us__subtitle">Cực kỳ nhanh chóng</span><span class="why_us__desc">Nhận tiền thuận lợi qua tài khoản ngân hàng cá nhân của quý khách, hoặc các điểm giao dịch của các đối tác</span></div>
          <div class="why_us__item why_us__item-watch"><span class="why_us__subtitle">Có mặt bên bạn mọi lúc, mọi nơi</span><span class="why_us__desc">Dễ dàng yêu cầu khoản vay mà không cần phải đến chi nhánh</span></div>
        </div>
        <div class="why_us__list">
          <div class="why_us__item why_us__item-money"><span class="why_us__subtitle">Thanh toán linh hoạt</span><span class="why_us__desc">Trong tình huống không lường trước được, Doctor Đồng sẽ hỗ trợ gia hạn thanh toán tùy trường hợp</span></div>
          <div class="why_us__item why_us__item-heart"><span class="why_us__subtitle">Hỗ trợ tận tình</span><span class="why_us__desc">Chúng tôi mong muốn giúp bạn tìm ra giải pháp tài chính phù hợp nhất với nhu cầu</span></div>
        </div>
        <div class="why_us__action"><a data-scrollto="@form" href="#hero" class="btn btn-lg btn-primary scrolltoelem">Đăng ký vay</a></div>
      </div>
    </div>
    <div class="wrapper">
      <div class="review">
        <div data-height="150" data-width="100%" class="fotorama">
          <div>
            <div class="review__author"><strong class="review__author__name">Nguyễn Linh</strong><span class="review__author__age">26 tuổi</span></div>
            <div class="review__body">Cảm ơn Doctor Đồng! Ngay sau khi nộp hồ sơ vay đã có nhân viên gọi tư vấn về quy trình và khoản vay. Giờ thì đã có tin nhắn báo vào đúng 6 giờ là tiền đã được Doctor Đồng chuyển vào tài khoản.</div>
          </div>
          <div>
            <div class="review__author"><strong class="review__author__name">Hoàng</strong><span class="review__author__age">31 tuổi</span></div>
            <div class="review__body">Họ xử lý cho vay rất nhanh và còn định hướng về cách vay, quy trình. Doctor Đồng thật chu đáo!</div>
          </div>
          <div>
            <div class="review__author"><strong class="review__author__name">Huyền Trang</strong><span class="review__author__age">28 tuổi</span></div>
            <div class="review__body">Lần đầu vay tiền online cũng do dự nhưng tôi đã nhận được tiền vào tài khoản rất nhanh chóng. Hồ sơ được gửi chiều 12/10, tiền được nhận ngay hôm sau (dịch vụ 24 giờ) :) Cám ơn Doctor Đồng!</div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->