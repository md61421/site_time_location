(function ($, Drupal, drupalSettings) {
    Drupal.behaviors.updateTime = {
      attach: function (context, settings) {
        const timezone = drupalSettings.siteTimeLocation.timezone;
  
        function updateTime() {
          const now = new Date();
          const timeString = now.toLocaleTimeString('en-US', { timeZone: timezone });
          const dateString = now.toLocaleDateString('en-US', { timeZone: timezone });
          $('#time').text(timeString);
          $('#date').text(dateString);
        }
  
        updateTime();
        setInterval(updateTime, 1000);
      }
    };
  })(jQuery, Drupal, drupalSettings);
  