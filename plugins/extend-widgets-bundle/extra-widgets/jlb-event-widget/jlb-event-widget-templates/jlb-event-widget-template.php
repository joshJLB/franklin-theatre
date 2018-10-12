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
      <div class="event-widget-select-button"><i class="fal fa-angle-down"></i></div>
      <select class="event-widget-select" id="event-type-<?=$widgetID?>">
        <option value="" disabled selected>Event Type</option>
        <option value="e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&">All</option>
        <option value="bbd2d484-3501-42e9-9407-fac223065a5f&">Music</option>
        <option value="2e6a1af5-0ce4-490e-a0f1-9827e9a9d033&">Movies</option>
        <option value="12f03090-740d-429b-a093-73b1f3960f83&">Live Theatre</option>
      </select>
    </div>
  
    <div class="event-widget-select-wrap">
      <div class="event-widget-select-button"><i class="fal fa-angle-down"></i></div>
      <select class="event-widget-select" id="event-date-<?=$widgetID?>">
        <option value="" disabled selected>Event Date</option>
        <?php
        $month = date("m");
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $year = date("Y");
        $adder = 0;
        ?>
        <!-- Loops through months starting at the current date. The year increases when $month reaches 12 -->
        <?php while ($adder <= 11):
          $adder++;
        ?>
          <option value="<?=$year?>/<?=$month?>/1"><?=$monthName?></option>
        <?php  if ($month == 12):
            $month = 01;
            $year++;
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
          else:
            $month++;
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
          endif;
        endwhile;
        ?>
      </select>
    </div>
  </div>

    <script>
      
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
<div class="home-url" data-attribute="<?=home_url(); ?>"></div>
<div class="event-widget-id" data-attribute="<?=$widgetID?>"></div>