window.morePostsLoading = false;

function loadMorePosts() {

  if(window.morePostsLoading == false) {
    window.morePostsLoading = true;

    jQuery('.loadmoreButton').hide();

    var offset = jQuery('.postscontent article').length;
    //alert("OFFSET: "+offset);
    jQuery.ajax({
      type:'POST',
      url:ajaxUrl,
      data:{action:'LoadMorePosts', offset:offset},
      success:function(html){
        jQuery('.loadmoreButton').show();

        if(html != ''){
          jQuery('.postscontent').append(html);
        } else {
          jQuery('.loadmoreButton').hide();
        }
        window.morePostsLoading = false;        
      }
    });
  }
  
}

jQuery(function() {
  jQuery('.mainfooter_scroll').on('click', function(){
      jQuery(document.body).scrollTop(0);
  });

  jQuery('.loadmoreButton').on('click', loadMorePosts);

  jQuery(window).on('scroll', function(){
    //window.scrollY = a posição atual do scroll
    // document.body.scrollHeight = A altura total do site

    var pct = (window.scrollY / document.body.scrollHeight) * 100;
    if(pct >= 50) {
      loadMorePosts();
    }
   });
});