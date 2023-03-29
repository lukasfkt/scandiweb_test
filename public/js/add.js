const DVD = $(".dvd_container");
const FURNITURE = $(".furniture_container");
const BOOK = $(".book_container");

const SIZE = $("#size");
const HEIGHT = $("#height");
const WIDTH = $("#width");
const LENGHT = $("#lenght");
const WEIGHT = $("#weight");

$(document).ready(() => {
  function hideContainers() {
    DVD.hide();
    FURNITURE.hide();
    BOOK.hide();
  }

  hideContainers();

  $("#productType").change(() => {
    const valueSelected = $("#productType").val();

    // Clear inputs value
    SIZE.val("");
    HEIGHT.val("");
    WIDTH.val("");
    LENGHT.val("");
    WEIGHT.val("");

    switch (valueSelected) {
      case "dvd":
        // Make DVD container visible and Size input required
        DVD.show();
        FURNITURE.hide();
        BOOK.hide();
        SIZE.prop("required", true);
        HEIGHT.prop("required", false);
        WIDTH.prop("required", false);
        LENGHT.prop("required", false);
        WEIGHT.prop("required", false);
        break;

      case "book":
        // Make Book container visible and Weight input required
        DVD.hide();
        FURNITURE.hide();
        BOOK.show();
        SIZE.prop("required", false);
        HEIGHT.prop("required", false);
        WIDTH.prop("required", false);
        LENGHT.prop("required", false);
        WEIGHT.prop("required", true);
        break;

      case "furniture":
        // Make Furniture container visible and Height, Width and Lenght input required
        DVD.hide();
        FURNITURE.show();
        BOOK.hide();
        SIZE.prop("required", false);
        HEIGHT.prop("required", true);
        WIDTH.prop("required", true);
        LENGHT.prop("required", true);
        WEIGHT.prop("required", false);
        break;

      default:
        DVD.hide();
        furniture.hide();
        BOOK.hide();
        SIZE.prop("required", false);
        HEIGHT.prop("required", false);
        WIDTH.prop("required", false);
        LENGHT.prop("required", false);
        WEIGHT.prop("required", false);
        break;
    }
  });

  $("#product_form").submit(function (e) {
    e.preventDefault();

    let inputs = {};
    $(this)
      .find(":input")
      .each(function () {
        inputs[$(this).attr("name")] = $(this).val();
      });

    $.post("/saveproduct", inputs, function (data, status) {})
      .done(function () {
        document.location.href = "/";
      })
      .fail(function () {
        $(".error-message").html("Internal Error");
      });
  });
});
