(function ($) {
  $(document).ready(function(){
	  
    // alert("test js file loads");

    setTimeout(() => {

      if (document.getElementById('cboxLoadedContent') !== null) {
	    
        document.getElementById('cboxLoadedContent').innerHTML = '<a id="endOfYear" onclick="restorePage()" href="/donate-now"><div id="modalContent"><img id="modalImage" src="https://wriorg.s3.amazonaws.com/modals-notices/19_EVT_+YEAR+END_+Modal.png" alt="image: now more than ever facts matter, donate now" /></div></a>';
        document.getElementById('cboxLoadedContent').style.overflow = 'hidden';
        document.getElementById('page').style.opacity = '0.5';
        var modalButton = document.getElementById('cboxClose');
        modalButton.addEventListener('click', restorePage);

      }

    }, 500);

    function restorePage() {
      document.getElementById('page').style.opacity = '1';
    }

  });
})(jQuery);
