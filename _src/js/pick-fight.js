jQuery(document).ready(function($) {
  if ($(".fight-picker-overlay").length > 0) {

    var main_title = $(".pick-your-fight-holder").attr("data-main-title");
    var sub_title = $(".pick-your-fight-holder").attr("data-sub-title");

    $(".pick-your-fight-holder .main-title").on("click", function(e) {
      e.preventDefault();
      $(".fight-picker-overlay").addClass("is-active");

      $(".pick-your-fight-holder .js-post-link span").html("&nbsp;");

      var list = $(this).data("list");

      $("." + list).addClass("is-active");

      // $(".post-ajax-holder").hide();
      $(".pick-your-fight-post-detail").hide();
      $(".related_content").removeClass("is-active");
    });

    $(".pick-your-fight-holder .main-sub-title").on("click", function(e) {
      e.preventDefault();
      $(".fight-picker-overlay").addClass("is-active");

      $(".pick-your-fight-holder .js-post-link span").html("&nbsp;");

      var sub_target = $(this).attr("data-list-index");
      // console.log("sub_target", sub_target);

      $(".fight-picker-overlay")
        .find(".main-sub-title[data-sub-index='" + sub_target + "']")
        .addClass("is-active");

      // $(".post-ajax-holder").hide();
      $(".pick-your-fight-post-detail").hide();
      $(".related_content").removeClass("is-active");
    });

    $(".pick-your-fight-holder .js-post-link").on("click", function(e) {
      e.preventDefault();

      $(".pick-your-fight-post-detail").hide();

      // console.log("post-list");
      if ($(".post-list").children().length != 0) {
        $(".fight-picker-overlay").addClass("is-active");
        $(".fight-picker-overlay")
          .find(".post-list")
          .addClass("is-active");
      }

      $(".pick-your-fight-post-detail").hide();
      $(".related_content").removeClass("is-active");
    });

    getRelatedPost(main_title, sub_title);

    $(".fight-picker-overlay .main-title li").on("click", function(e) {
      e.preventDefault();
      var data = $(this).data("value");
      var label = $(this).text();
      $(".pick-your-fight-holder .main-title span").text(label);

      var new_target = $(".fight-picker-overlay")
        .find("[data-parent='" + data + "']")
        .find("li")
        .eq(0)
        .text();

      main_title = data;

      $(".pick-your-fight-holder .main-sub-title").attr(
        "data-list-index",
        $(this).attr("data-index")
      );

      $(".pick-your-fight-holder .main-sub-title span").text(new_target);

      $(".fight-picker-overlay").removeClass("is-active");
      $(".fight-picker-overlay")
        .find(".is-active")
        .removeClass("is-active");
    });

    $(".fight-picker-overlay .main-sub-title li").on("click", function(e) {
      e.preventDefault();
      var data = $(this).data("value");
      var label = $(this).text();

      sub_title = data;

      $(".pick-your-fight-holder .main-sub-title span").text(label);

      $(".fight-picker-overlay").removeClass("is-active");
      $(".fight-picker-overlay")
        .find(".is-active")
        .removeClass("is-active");

      // console.log(main_title, sub_title);
      getRelatedPost();
    });

    $(".fight-picker-overlay .post-list").on("click", "li", function(e) {
      e.preventDefault();

      $(".fight-picker-overlay").removeClass("is-active");
      $(".fight-picker-overlay")
        .find(".is-active")
        .removeClass("is-active");

      $(".pick-your-fight-holder .js-post-link span").text($(this).text());

      var id = $(this).attr("data-post-id");

      var xhrRequest = null;
      // Make ajax request
      var data = {
        action: "open_pick_your_fight",
        security: revolt_ajax_params.security,
        post_id: id,
      };

      xhrRequest = $.post(revolt_ajax_params.ajaxurl, data, function(response) {
        // console.log("response", response);
        response = JSON.parse(response);

        $(".pick-your-fight-post-detail").slideDown();

        if (response.post.featured_img) {
          $(".pick-your-fight-post-detail .bg-holder").css(
            "background-image",
            "url(" + response.post.featured_img + ")"
          );
        }

        $(".post-ajax-holder").empty();
        $(".post-ajax-holder").append(response.post.content);

        $(".related-ajax-posts").empty();

        for (var i = 0; i < response.post.related_articles.length; i++) {
          var _item = response.post.related_articles[i];
          var _img = _item.article_image
            ? `<div class="related_item--img"><img src="${_item.article_image}" /></div>`
            : "";
          var _html = `<div class="col-md-4"><a href="${_item.article_link}" target="_blank" class="related_item">${_img}<h4 class="related_item--title">${_item.article_name}</h4></a></div>`;
          $(".related-ajax-posts").append(_html);
        }

        $(".related_content").addClass("is-active");
      });
    });

    function getRelatedPost() {
      $(".pick-your-fight-post-detail").hide();

      // console.log("getRelatedPost");
      $(".post-list li").remove();

      var xhrRequest = null;

      if (xhrRequest !== null && xhrRequest.readyState !== 4) return false;

      // Make ajax request
      var data = {
        action: "pick_your_fight",
        security: revolt_ajax_params.security,
        main_title: main_title,
        sub_title: sub_title,
      };

      xhrRequest = $.post(revolt_ajax_params.ajaxurl, data, function(response) {
        // console.log("response", response);
        response = JSON.parse(response);

        if (response.code == 200) {
          $(".post-list li").remove();

          for (var i = 0; i < response.list.length; i++) {
            $(".post-list").append(
              "<li data-post-id=" +
                response.list[i].post_id +
                ">" +
                response.list[i].title +
                "</li>"
            );
          }
        }
      });
    }
  }
});
