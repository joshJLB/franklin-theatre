jQuery(document).ready(function( $ ){
    
    var homeURL = $('.home-url').attr('data-attribute');
    var widgetID = $('.event-widget-id').attr('data-attribute');
    var category = '';
    var guidNumber = 'e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&';
    
    // Gets current date and formats to yyyy-mm-dd
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
    startDate = yyyy + '-' + mm + '-' + dd;
    
    var endDate = endOfMonth(startDate);
    var url = `http://prod1.agileticketing.net/websales/feed.ashx?guid=e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&&startdate=${startDate}&enddate=${endDate}&format=json&`;
    
    // Gets current month name
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var newMonth = new Date();
    var currentMonth = monthNames[newMonth.getMonth()]; 
    
    // This is what initially renders in the DOM
     
        $('.event-widget-title').remove();
        let headerElements = `<div class="event-widget-title">
                              <div class="event-border-left" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/date-HR.jpg);"></div>
                              <h2>${currentMonth}</h2>
                              <div class="event-border-right" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/date-HR.jpg);"></div>
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
                                    <a href="${details}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                                    <a href="${tickets}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                                  </div>
                                </div> 
                                <div class="event-content-wrap">
                                  <div class="event-widget-time">
                                    <p>${monthDay}</p>
                                    <img src="${homeURL}/wp-content/uploads/2018/10/spacer-element.png">
                                    <p>${time}</p>
                                  </div>
                                  ${name} 
                                  <p class="event-widget-description">${description}</p>
                                  <div class="event-widget-link-wrapper-two">
                                    <a href="${details}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/hero-button.png);">View Details</a>
                                    <a href="${tickets}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/hero-button.png);">Buy Tickets</a>
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

    $(`#event-type-${widgetID}`).change(function(){
      // Gets value of selected event type dropdown
      guidNumber = $(`#event-type-${widgetID}`).val();
      updateDOM();
    });

    $(`#event-date-${widgetID}`).change(function(){
      // Gets value of selected event date dropdown
      startDate = $(`#event-date-${widgetID}`).val();
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
                              <div class="event-border-left" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
                              <h2>${currentMonth}</h2>
                              <div class="event-border-right" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
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
                                    <a href="${details}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                                    <a href="${tickets}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                                  </div>
                                </div> 
                                <div class="event-content-wrap">
                                  <div class="event-widget-time">
                                    <p>${monthDay}</p>
                                    <img src="${homeURL}/wp-content/uploads/2018/10/spacer-element.png">
                                    <p>${time}</p>
                                  </div>
                                  ${name} 
                                  <p class="event-widget-description">${description}</p>
                                  <div class="event-widget-link-wrapper-two">
                                    <a href="${details}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/hero-button.png);">View Details</a>
                                    <a href="${tickets}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/hero-button.png);">Buy Tickets</a>
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
                              <div class="event-border-left" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
                              <h2>${currentMonth}</h2>
                              <div class="event-border-right" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
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
                                    <a href="${details}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                                    <a href="${tickets}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                                  </div>
                                </div> 
                                <div class="event-content-wrap">
                                  <div class="event-widget-time">
                                    <p>${monthDay}</p>
                                    <img src="${homeURL}/wp-content/uploads/2018/10/spacer-element.png">
                                    <p>${time}</p>
                                  </div>
                                  ${name} 
                                  <p class="event-widget-description">${description}</p>
                                  <div class="event-widget-link-wrapper-two">
                                    <a href="${details}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/hero-button.png);">View Details</a>
                                    <a href="${tickets}" class="event-widget-link" style="background-image: url(${homeURL}/wp-content/uploads/2018/10/hero-button.png);">Buy Tickets</a>
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
      console.log(myDate);
      let date = new Date(myDate);
      let month = monthNames[date.getMonth()];
      return month;
    }
    // Gets the suffix for the day of the month
    function nth(n){return n + [,'st','nd','rd'][n%100>>3^1&&n%10]||n + 'th'}
  });