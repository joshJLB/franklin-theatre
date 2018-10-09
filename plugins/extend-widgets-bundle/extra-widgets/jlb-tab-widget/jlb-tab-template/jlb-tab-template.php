<div class="tab-widget-container">
  <div class="tab-container">
    <?php
      $widgetID  = $instance['panels_info']['id'];
      $tabs = $instance['a_repeater'];
      $count = 0; ?>

    <form id="radio-<?=$widgetID?>">
      <input id="radio-1" type="radio" name="radioName" value="" checked>
      <label for="radio-1">All</label>
      <input id="radio-2" type="radio" name="radioName" value="Red">
      <label for="radio-2">Red</label>
      <input id="radio-3" type="radio" name="radioName" value="Franklin">
      <label for="radio-3">Franklin</label>
      <input id="radio-4" type="radio" name="radioName" value="Category">
      <label for="radio-4">Category</label>
      <input id="radio-5" type="radio" name="radioName" value="Category">
      <label for="radio-5">Category</label>
      <input id="radio-6" type="radio" name="radioName" value="Category">
      <label for="radio-6">Category</label>
    </form>

    <select id="event-type-<?=$widgetID?>">
      <option value="" disabled selected>Event Type</option>
      <option value="e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&">All</option>
      <option value="bbd2d484-3501-42e9-9407-fac223065a5f&">Music</option>
      <option value="2e6a1af5-0ce4-490e-a0f1-9827e9a9d033&">Movies</option>
      <option value="12f03090-740d-429b-a093-73b1f3960f83&">Live Theatre</option>
    </select>

    <select id="event-date-<?=$widgetID?>">
      <option value="" disabled selected>Event Date</option>
      <option value="">All</option>
      <option value="2019-01-01">January</option>
      <option value="2019-02-01">February</option>
      <option value="2019-03-01">March</option>
      <option value="2019-04-01">April</option>
      <option value="2019-05-01">May</option>
      <option value="2019-06-01">June</option>
      <option value="2019-07-01">July</option>
      <option value="2019-08-01">August</option>
      <option value="2019-09-01">September</option>
      <option value="2018-10-01">October</option>
      <option value="2018-11-01">November</option>
      <option value="2018-12-01">December</option>
    </select>

    <script>
      $(document).ready(function(){
        
        var category = '';
        var guidNumber = 'e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&';
        var url = "http://prod1.agileticketing.net/websales/feed.ashx?guid=e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&&showslist=true&format=json&";
        var startDate = '';
        var endDate = '';
        var results = $.get(url, function(data, status) {
              let results = data.ArrayOfShows;
              for (let i = 0; i < results.length; i++) {
                let name = `<h3>${results[i].Name}</h3>`;
                let image = results[i].EventImage;
                let details = results[i].InfoLink;
                let tickets = results[i].CurrentShowings[0].LegacyPurchaseLink;
                $('.agile-test').append(name);
              }
            });
        
        $('#radio-<?=$widgetID?>').change(function() {
          // Selected value
          category = $('input[name=radioName]:checked', '#radio-<?=$widgetID?>').val();
          updateDOM();
        });

        $('#event-type-<?=$widgetID?>').change(function(){
          // Selected value
          guidNumber = $('#event-type-<?=$widgetID?>').val();
          updateDOM();
        });

        $('#event-date-<?=$widgetID?>').change(function(){
          // Selected value
          startDate = $('#event-date-<?=$widgetID?>').val();
          endDate = endOfMonth(startDate);
          console.log(endDate);
          updateDOM();
        });
        
        function updateDOM() {
          if (category == '' && guidNumber && startDate == '') {
            url = `http://prod1.agileticketing.net/websales/feed.ashx?guid=${guidNumber}&showslist=true&kw=&format=json&`;
            results = $.get(url, function(data, status) {
              return data;
            });
          } else {
            url = `http://prod1.agileticketing.net/websales/feed.ashx?guid=${guidNumber}&showslist=true&kw=${category}&startdate=${startDate}&enddate=${endDate}&format=json&`;
          }
        }

        function endOfMonth(myDate){
          let date = new Date(myDate);
          date.setYear(date.getYear())
          date.setMonth(date.getMonth() + 1)
          date.setDate(0);
          return date;
        }
      });
    </script>

    <div class="agile-test">
      
    </div>
    
  </div>
</div>
