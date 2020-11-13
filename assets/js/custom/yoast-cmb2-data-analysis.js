(function($){


  function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return !!right[Symbol.hasInstance](left); } else { return left instanceof right; } }

  function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

  function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

  function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

  /* global YoastSEO */
  var MyCustomDataPlugin = /*#__PURE__*/function () {
    function MyCustomDataPlugin() {
      _classCallCheck(this, MyCustomDataPlugin);

      // Ensure YoastSEO.js is present and can access the necessary features.
      if (typeof YoastSEO === "undefined" || typeof YoastSEO.analysis === "undefined" || typeof YoastSEO.analysis.worker === "undefined") {
        return;
      }

      YoastSEO.app.registerPlugin("MyCustomDataPlugin", {
        status: "ready"
      });
      this.registerModifications();
    }
    /**
     * Registers the addContent modification.
     *
     * @returns {void}
     */


    _createClass(MyCustomDataPlugin, [{
      key: "registerModifications",
      value: function registerModifications() {
        var callback = this.addContent.bind(this); // Ensure that the additional data is being seen as a modification to the content.

        YoastSEO.app.registerModification("content", callback, "MyCustomDataPlugin", 10);
      }
      /**
       * Adds to the content to be analyzed by the analyzer.
       *
       * @param {string} data The current data string.
       *
       * @returns {string} The data string parameter with the added content.
       */

    }, {
      key: "addContent",
      value: function addContent(data) {
        var cmb2_content = '';
        $('#wp-_dimakin_products_fulltext-wrap').find(
          'textarea'
        ).each(function() { 
          if( $(this).val() ){
            cmb2_content += '';
            if( $(this).hasClass('cmb2-upload-file') ){
              cmb2_content += '<img src="' + $(this).parent().find('.img-status img').attr('src') + '" alt="' + $(this).parent().find('.img-status img').attr('alt') + '" />';
            }
            else{
              cmb2_content += $(this).val();  
            }
          }
        });
        data += cmb2_content;
        return data;
        
      }
    }]);

    return MyCustomDataPlugin;
  }();
  /**
   * Adds eventlistener to load the plugin.
   */


  if (typeof YoastSEO !== "undefined" && typeof YoastSEO.app !== "undefined") {
    new MyCustomDataPlugin();
    console.log('ya detectou o yoast');
  } else {
    jQuery(window).on("YoastSEO:ready", function () {
      new MyCustomDataPlugin();
      console.log('o yoast ficou ready e activei');
    });
  }

})(jQuery);