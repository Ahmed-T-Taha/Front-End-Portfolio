$("#btn").click(function () {
  var w = $("#w").val();
  var h = $("#h").val();
  var bmi = w / ((h * h) / 10000);

  if (bmi > 25) var result = "Overweight";
  else if (bmi > 18.5) var result = "Normal Weight";
  else var result = "Underweight";

  $("#result").html(result);
});

$("#j").fadeIn(3000);
