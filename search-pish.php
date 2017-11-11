<?php get_header();
/*template Name:search-pish */

?>

<?php  wp_enqueue_script( 'searchpish', get_template_directory_uri() . '/js/searchpish.js', array(), '2.0.0', true ); ?>

<label >کلمه کلیدی</label>
<input type="text" name="keyword" id="keyword">
<br/>
<label >دسته بندی</label>
<input type="text" name="category" id="category"><br/>
<label >جنسیت</label>
<select name="gender" id="gender" >
	<option value="man">مرد</option>
	<option value="woman">زن</option>
</select><br/>
<label >سن</label>
<input type="number" name="age" id="age"><br/>

<label >زبان</label>
<select name="language" id="language">
	<option value="persian">فارسی</option>
	<option value="english">انگلیسی</option>
	<option value="arabic">عربی</option>
	<option value="turkish">ترکی</option>
	<option value="french">فرانسوی</option>
	<option value="german">آلمانی</option>
	<option value="Indolent">بی کلام</option>
</select><br/>
<input class="searchbutton" type="submit" value="جستجو">


<h3>serarch results:</h3>



<table>
	<tr>
		<th>
			name
		</th>

		<th>
			link
		</th>
	</tr>


	<tr>
		<td>

		</td>

	</tr>



</table>











<script type="text/javascript">


/* Make a ajax function for use ajax in site */

(function( $ ) {
	$(function() {
		$('.searchbutton').click(function() {	
			//$('showLoading').css('display','block');
			
          var keyword =$("#keyword").val();
            var category =$("#category").val();

            var gender =$("#gender").val();
            var age =$("#age").val();
            var language =$("#language").val();





            GetNews(keyword,category,gender,age,language );





		});
		function GetNews(keyword,category,gender,age,language ){
			$.ajax({
				url:ajaxurl,
				type : "POST",
				data : {action: "catnews_ajax",keyword:keyword},
				success: function(response) {

					jQuery.each( response, function(  key, value ) {

					

						news += '<div class="post-review col-md-3 col-sm-12 col-xs-12">';
						
					/*	news += '<h3><a href="'+value.shortlink+'">'+value.title+'</a></h3>';   */
						//news += '<div class="txt-on-pic1s" ><a href="'+value.catID+'"> '+value.catname+'</a></div>';
						news += '</div>';
						

					
					});

				
				}
			});   
		}

	});
})(jQuery);




</script>



<?php get_footer(); ?>