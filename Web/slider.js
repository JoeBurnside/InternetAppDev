	images = ['images/slide1.jpg', 'images/slide2.jpg', 'images/slide3.jpg', 'images/slide4.jpg', 'images/slide5.jpg', 'images/slide6.jpg', 'images/slide7.jpg', 'images/slide8.jpg', 'images/slide9.jpg'];
	descriptions = ['Our Bacon Burger', 'Fried Chicken', 'Spaghetti and Meatballs', 'Breaded King Prawns', 'Pancakes with Strawberries', 'Vegetarian Pizza', 'All Day Breakfast', 'Homemade Chocolate Cake', 'Guinness available at the bar'];
	
	$(document).ready(function() {
	
		beginNow = setInterval(nextImage, 4000);
	
		$('#description').html(descriptions[0]);
	
		function nextImage() {
		currentImageKey();
			if (i < images.length - 1) {
				changeImage(i + 1);
				descriptionChange(i + 1);
			} 
			else {
				changeImage(0);
				descriptionChange(0);
			}
		}
	
		function previousImage() {
		currentImageKey();
			if (i == 0) {
				changeImage(images.length - 1);
				descriptionChange(images.length - 1);
			} 
			else {
				changeImage(i - 1);
				descriptionChange(i - 1);
			}
		}

		function currentImageKey() {
			i = jQuery.inArray($('#slideshow').attr('src'), images);
			return i;
		}
	
		function changeImage(k) {
		currentImageKey()
			if (i != k) {
				$('#slideshow').stop().animate({
				opacity: 0,
					}, 200, function() {
				$('#slideshow').attr('src', images[k]);
					$('#holder img').load(function() {
						$('#slideshow').stop().animate({
							opacity: 1,
						}, 200)
					})
				})
			}
		}
	
		function descriptionChange(newDescript){
		currentImageKey()
			if (i != newDescript) {
				$('#description').stop().animate({
				opacity: 0,
				}, 200, function() {
					$('#description').html(descriptions[newDescript]);
					$('#description').animate({
						opacity: 1,
					}, 200)
				})
			}
		}
	
		$('#firstNav').click(function() {
			clearInterval(beginNow);
			changeImage(0);
			descriptionChange(0);
		});
	
		$('#previousNav').click(function() {
			clearInterval(beginNow);
			previousImage();
		});
	
		$('#randomNav').click(function() {
			var randomnumber = Math.floor((images.length) * Math.random());
			clearInterval(beginNow);
			changeImage(randomnumber);
			descriptionChange(randomnumber);
		});
	
		$('#nextNav').click(function() {
			clearInterval(beginNow);
			nextImage();
		});
		
		$('#lastNav').click(function() {
			clearInterval(beginNow);
			changeImage(images.length - 1);
			descriptionChange(images.length - 1);
		});
	
		$('#imageHolder').css('width', images.length*87);
	
		$.each(images, function(index, value) {
			$('#imageHolder').append('<img src="'+value+'" />');
		});

		$('#imageHolder img').click(function(){
			var newImage = $(this).attr('src');
			$.each(images, function(index,value){
				if (value == newImage){
					descriptionChange(index);
					changeImage(index);
				}
			});
			clearInterval(beginNow);
		})
		
		$('.thumbnailArrows').hover(function() {
			var whiches = $(this).children('img').attr('id');
			if (whiches == 'Tleft') {
			movingThumbs(2000, '+');
			}
			else {
			movingThumbs(2000, '-');
			}
			}, function() {
			$('#imageHolder').stop();
		});
		
		function movingThumbs(speed, direction) {
			var currentLeft = $('#imageHolder').position().left;
			var moving = $('#imageHolder').width() - (Math.abs($('#imageHolder').position().left) + $('#window').width());
				if (currentLeft == 0 && direction == '+') {
				//do nothing
				} else if (Math.abs($('#imageHolder').position().left) + $('#window').width() >= $('#imageHolder').width() && direction == '-') {
				//do nothing
				} else if (direction == '+' && currentLeft != 0) {
				$('#imageHolder').animate({
				left: 0,
				}, speed);
				} else {
				$('#imageHolder').animate({
				left: '+='+direction + moving,
				}, speed);
				}
			}
	
	});