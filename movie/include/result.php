<?php 
    //$mondayTimestamp = strtotime('monday this week');
    $output = [];
    for ($day = 0; $day < 6; $day++) {
        $output[] = date('Y-m-d', strtotime(sprintf('+%d day', $day),));
    } 
?>

<select name="date" id="date">
    <option value="date">Chọn ngày</option>
    <?php foreach ($output as $day) : ?>
    <option value="<?php echo $day ;?>"><?php echo $day ;?></option>
    <?php endforeach; ?>
</select>

<?php

    require_once('simple_html_dom.php'); 

    $id = $_GET['id']; 

    $url = 'https://moveek.com/cinema/showtime/'.$id.'?date=&header=1';

    $content = file_get_html2($url);

    foreach($content->find('.showtimes .card-sm') as $list){

    }    

?>

<table id="date-display"></table>

<script>
  $('body').on('change', '#date', function () {
    var ngay = $(this).val();
    var id = $('#cinema').val();
    var url = './include/day_select.php';
    $.ajax({
      url: url,
      method: 'GET',
      data: {
        id: id,
        ngay: ngay
      },
      dataType: 'html',
      success: function (result) {
        $('#date-display').empty();
        $('#date-display').html(result)
      }
    })
  })

</script>




