<div class="event-widget-container">
  <?php
    $widgetID  = $instance['panels_info']['id'];
    $repeater = $instance['categories'];
    $count = 1;
  ?>
  <div class="event-widget-filter">
    <form class="event-widget-radio" id="radio">
      <input id="radio-1" type="radio" name="radioName" value="" checked>
      <label for="radio-1" class="active">All
        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/bottom-fan.jpg" alt="">
      </label>
      <?php foreach($repeater as $index => $slide){
        $count++;
        $category = $slide['category'];
      ?>
        <input id="radio-<?=$count?>" type="radio" name="radioName" value="<?=$category?>">
        <label for="radio-<?=$count?>"><?=$category?>
          <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/bottom-fan.jpg" alt="">
        </label>
      <?php } ?>
      
    </form>

    <div class="event-widget-select-wrap">
      <select class="event-widget-select" id="event-type-<?=$widgetID?>">
        <option value="" disabled selected>Event Type</option>
        <option value="e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&">All</option>
        <option value="bbd2d484-3501-42e9-9407-fac223065a5f&">Music</option>
        <option value="2e6a1af5-0ce4-490e-a0f1-9827e9a9d033&">Movies</option>
        <option value="12f03090-740d-429b-a093-73b1f3960f83&">Live Theatre</option>
      </select>
    </div>
  
    <div class="event-widget-select-wrap">
      <select class="event-widget-select" id="event-date-<?=$widgetID?>">
        <option value="" disabled selected>Event Date</option>
        <option value="2019-1-1">January</option>
        <option value="2019-2-1">February</option>
        <option value="2019-3-1">March</option>
        <option value="2019-4-1">April</option>
        <option value="2019-5-1">May</option>
        <option value="2019-6-1">June</option>
        <option value="2019-7-1">July</option>
        <option value="2019-8-1">August</option>
        <option value="2019-9-1">September</option>
        <option value="2018-10-1">October</option>
        <option value="2018-11-1">November</option>
        <option value="2018-12-1">December</option>
      </select>
    </div>
  </div>

    <script>
      $(document).ready(function(){
        
        var category = '';
        var guidNumber = 'e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&';
        
        var startDate = new Date();
        var dd = startDate.getDate();
        var mm = startDate.getMonth()+1; 
        var yyyy = startDate.getFullYear();
        if(dd<10) {
            dd = '0'+dd
        } 
        if(mm<10) {
            mm = '0'+mm
        } 
        // Gets today's date
        startDate = yyyy + '-' + mm + '-' + dd;
        
        var endDate = endOfMonth(startDate);
        var url = `http://prod1.agileticketing.net/websales/feed.ashx?guid=e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&&startdate=${startDate}&enddate=${endDate}&format=json&`;
        
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var newMonth = new Date();
        // Gets current month
        var currentMonth = monthNames[newMonth.getMonth()]; 
        
        var initialDOM = 
            $('.event-widget-title').remove();
            let headerElements = `<div class="event-widget-title">
                                  <div class="event-border-left" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
                                  <h2>${currentMonth}</h2>
                                  <div class="event-border-right" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
                                </div>`;
            $('.event-widget-title-container').append(headerElements);
            $.get(url, function(data, status) {
              // Deletes current body content and appends updated content parameters for the DOM.
              $('.event-widget-card-wrapper').remove();
              let results = data.ArrayOfEvent;
              for (let i = 0; i < results.length; i++) {
                let monthDay = currentMonth + ' ' + nth(new Date(results[i].StartDate).getDate()); // Concats the current month with the day of the month. "nth" funtion concats the day with the appropriate suffix
                let time = new Date(results[i].StartDate).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"); // Gets the time of the day in 12hour format and concats with appropriate suffx
                let name = `<h3>${results[i].Name}</h3>`;
                let image = results[i].EventImage;
                let description = results[i].ShortDescription;
                let details = results[i].InfoLink;
                let tickets = results[i].BuyLink;
                let contentElements = `<div class="event-widget-card-wrapper">
                                  <div class="event-widget-card">
                                    <div class="event-widget-image" style="background-image: url(${image});">
                                      <div class="overlay"></div>
                                      <div class="event-widget-link-wrapper">
                                        <a href="${details}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                                        <a href="${tickets}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                                      </div>
                                    </div> 
                                    <div class="event-content-wrap">
                                      <div class="event-widget-time">
                                        <p>${monthDay}</p>
                                        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png">
                                        <p>${time}</p>
                                      </div>
                                      ${name} 
                                      <p class="event-widget-description">${description}</p>
                                      <div class="event-widget-link-wrapper-two">
                                        <a href="${details}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">View Details</a>
                                        <a href="${tickets}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">Buy Tickets</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>`;
                $('.event-widget-cards-container').append(contentElements);
              }
            });
        $('#radio').change(function() {
          // Gets value of selected radio button
          category = $('input[name=radioName]:checked', '#radio').val();
          updateDOM();
          if ($('input[name=radioName]', '#radio').next().hasClass('active')) {
            $('input[name=radioName]', '#radio').next().removeClass('active');
          }
          $('input[name=radioName]:checked', '#radio').next().toggleClass('active');
        });

        $('#event-type-<?=$widgetID?>').change(function(){
          // Gets value of selected event type dropdown
          guidNumber = $('#event-type-<?=$widgetID?>').val();
          updateDOM();
        });

        $('#event-date-<?=$widgetID?>').change(function(){
          // Gets value of selected event date dropdown
          startDate = $('#event-date-<?=$widgetID?>').val();
          endDate = endOfMonth(startDate);
          currentMonth = getCurrentMonth(startDate);
          updateDOM();
        });
        
        function updateDOM() {
          // Updates what is printed to the DOM.
          if (category == '' && guidNumber && startDate) {
            url = `http://prod1.agileticketing.net/websales/feed.ashx?guid=${guidNumber}&startdate=${startDate}&enddate=${endDate}&kw=&format=json&`;
            // Deletes current title content and appends updated content parameters for the DOM.
            $('.event-widget-title').remove();
            let headerElements = `<div class="event-widget-title">
                                  <div class="event-border-left" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
                                  <h2>${currentMonth}</h2>
                                  <div class="event-border-right" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
                                </div>`;
            $('.event-widget-title-container').append(headerElements);
            $.get(url, function(data, status) {
              // Deletes current body content and appends updated content parameters for the DOM.
              $('.event-widget-card-wrapper').remove();
              let results = data.ArrayOfEvent;
              for (let i = 0; i < results.length; i++) {
                let monthDay = currentMonth + ' ' + nth(new Date(results[i].StartDate).getDate()); // Concats the current month with the day of the month. "nth" funtion concats the day with the appropriate suffix
                let time = new Date(results[i].StartDate).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"); // Gets the time of the day in 12hour format and concats with appropriate suffx
                let name = `<h3>${results[i].Name}</h3>`;
                let image = results[i].EventImage;
                let description = results[i].ShortDescription;
                let details = results[i].InfoLink;
                let tickets = results[i].BuyLink;
                let contentElements = `<div class="event-widget-card-wrapper">
                                  <div class="event-widget-card">
                                    <div class="event-widget-image" style="background-image: url(${image});">
                                      <div class="overlay"></div>
                                      <div class="event-widget-link-wrapper">
                                        <a href="${details}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                                        <a href="${tickets}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                                      </div>
                                    </div> 
                                    <div class="event-content-wrap">
                                      <div class="event-widget-time">
                                        <p>${monthDay}</p>
                                        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png">
                                        <p>${time}</p>
                                      </div>
                                      ${name} 
                                      <p class="event-widget-description">${description}</p>
                                      <div class="event-widget-link-wrapper-two">
                                        <a href="${details}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">View Details</a>
                                        <a href="${tickets}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">Buy Tickets</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>`;
                $('.event-widget-cards-container').append(contentElements);
              }
            });
          } else {
            url = `http://prod1.agileticketing.net/websales/feed.ashx?guid=${guidNumber}&kw=${category}&startdate=${startDate}&enddate=${endDate}&format=json&`;
            // Deletes current title content and appends updated content parameters for the DOM.
            $('.event-widget-title').remove();
            let headerElements = `<div class="event-widget-title">
                                  <div class="event-border-left" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
                                  <h2>${currentMonth}</h2>
                                  <div class="event-border-right" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
                                </div>`;
            $('.event-widget-title-container').append(headerElements);
            $.get(url, function(data, status) {
              // Deletes current body content and appends updated content parameters for the DOM.
              $('.event-widget-card-wrapper').remove();
              let results = data.ArrayOfEvent;
              for (let i = 0; i < results.length; i++) {
                let monthDay = currentMonth + ' ' + nth(new Date(results[i].StartDate).getDate()); // Concats the current month with the day of the month. "nth" funtion concats the day with the appropriate suffix
                let time = new Date(results[i].StartDate).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"); // Gets the time of the day in 12hour format and concats with appropriate suffx
                let name = `<h3>${results[i].Name}</h3>`;
                let image = results[i].EventImage;
                let description = results[i].ShortDescription;
                let details = results[i].InfoLink;
                let tickets = results[i].BuyLink;
                let contentElements = `<div class="event-widget-card-wrapper">
                                  <div class="event-widget-card">
                                    <div class="event-widget-image" style="background-image: url(${image});">
                                      <div class="overlay"></div>
                                      <div class="event-widget-link-wrapper">
                                        <a href="${details}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                                        <a href="${tickets}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                                      </div>
                                    </div> 
                                    <div class="event-content-wrap">
                                      <div class="event-widget-time">
                                        <p>${monthDay}</p>
                                        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png">
                                        <p>${time}</p>
                                      </div>
                                      ${name} 
                                      <p class="event-widget-description">${description}</p>
                                      <div class="event-widget-link-wrapper-two">
                                        <a href="${details}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">View Details</a>
                                        <a href="${tickets}" class="event-widget-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">Buy Tickets</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>`;
                $('.event-widget-cards-container').append(contentElements);
              }
            });
          }
        }

        function endOfMonth(myDate){
          // Gets the last date of the month that is selected. Pass in the variable "startDate"
          let date = new Date(myDate);
          let year = date.getFullYear();
          let month = date.getMonth() + 1;
          let newDate = new Date(year, month, 0);
          newDate = year + '-' + month + '-' + newDate.getDate();
          return newDate;
        }
        function getCurrentMonth(myDate) {
          // Gets the name of the month that is selected. Pass in the variable "startDate"
          let date = new Date(myDate);
          let month = monthNames[date.getMonth()];
          return month;
        }
        function nth(n){return n + [,'st','nd','rd'][n%100>>3^1&&n%10]||n + 'th'}
      });
    </script>

  <div class="event-widget-layout-buttons">
      <img class="event-grid active" src="<?=home_url(); ?>/wp-content/uploads/2018/10/gridicon.png" alt="">
      <img class="event-list" src="<?=home_url(); ?>/wp-content/uploads/2018/10/list-icon.png" alt="">
  </div>
  <div class="event-widget-title-container">
  
  </div>
  <div class="event-widget-cards-container">
  </div>
</div>