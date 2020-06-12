(function ($) {
  $(document).ready(function(){

    // alert("test js file loads");

    setTimeout(() => {
      document.getElementById("cboxClose").style.visibility = "hidden";
    }, 200);

    setTimeout(() => {

      if (document.getElementById('cboxLoadedContent') !== null) {

        document.getElementById("cboxClose").style.visibility = "visible";

        document.getElementById('cboxLoadedContent').innerHTML = '<a id="endOfYear" onclick="restorePage()" href="http://ow.ly/wVgI50zRz96" target="_blank"><div id="modalContent"><img id="modalImage" src="https://wriorg.s3.amazonaws.com/modals-notices/UX-test-modal.png" alt="image: help us improve" /></div></a>';
        document.getElementById('cboxLoadedContent').style.overflow = 'hidden';
        document.getElementById('page').style.opacity = '0.5';
        var modalButton = document.getElementById('cboxClose');
        modalButton.addEventListener('click', restorePage);

      }

    }, 4000);

    function restorePage() {
      document.getElementById('page').style.opacity = '1';
    }

  });
})(jQuery);
