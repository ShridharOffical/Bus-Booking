<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<input type="date" name="selected_date" id="date-field" />

<script>
    var disabledDates = ['2023-05-01', '2023-05-15', '2023-05-29'];
    var dateField = document.getElementById('date-field');
    dateField.setAttribute('min', '<?php echo date('Y-m-d'); ?>');
    disabledDates.forEach(function(date) {
        var option = document.createElement('option');
        option.setAttribute('value', date);
        option.setAttribute('disabled', true);
        dateField.appendChild(option);
    });
</script>


</body>
</html>

