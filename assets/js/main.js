$(function() { 
	draw_random_image();
	$('#videoModal').on('hidden.bs.modal', function () {
        var video = $("#youtube_video").attr("src");
		$("#youtube_video").attr("src","");
		$("#youtube_video").attr("src",video);
    });

	$("#submit_form").submit(function(event) {
        /* stop form from submitting normally */
        event.preventDefault();

        if (!event.target.checkValidity()) {
            return false;
        }
        popup_puzzle();
    });
})

function draw_random_image(){
	let image_indexs = [1,2,3,4,5,6];
	let random_array = shuffle(image_indexs);
	html = '';
	for(index = 0; index < image_indexs.length; index++){
		html += draw_image(random_array[index]);
	}
	$("#images").html(html);
}

function draw_image(index){
	return '<img class="image-item" id="img_' + index + '" src="/assets/img/' + index + '.jpg" draggable="true" ondragstart="drag(event)" />';
}

function shuffle(array) {
  let currentIndex = array.length,  randomIndex;

  // While there remain elements to shuffle.
  while (currentIndex != 0) {

    // Pick a remaining element.
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;

    // And swap it with the current element.
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex], array[currentIndex]];
  }

  return array;
}

function popup_puzzle(){
	$("#puzzle_modal").modal();
}

function allowDrop(event) {
  	event.preventDefault();
}

function drag(event) {
 	event.dataTransfer.setData("text", event.target.id);
}

function drop(event) {
  	event.preventDefault();

  	var data = event.dataTransfer.getData("text");

  	// event.target.appendChild(document.getElementById(data));
  	$("#"+data).parents(".drop-zone-item").removeAttr("alocate");
  	document.getElementById("images").appendChild(document.getElementById(data));
}

function drop_to_zone(event){
	event.preventDefault();

	let id = event.target.id;
	if($(event.target).attr('class') != "drop-zone-item"){
		id = $(event.target).parents(".drop-zone-item").attr("id");
	}
	if($("#" + id).attr("alocate")){
		return;
	}

	$("#" + id).attr("alocate", true);
	var data = event.dataTransfer.getData("text");
  	event.target.appendChild(document.getElementById(data));

  	let complete_flag = true;
  	let confirm_flag = true;
  	$('.drop-zone-item').map(function(){
  		if(!$(this).attr("alocate"))
  			complete_flag = false;

  		let parent_id = $(this).attr('id');
  		let child_id = $(this).find('img.image-item').attr('id');
  		if(parent_id != 'dropBox_' + child_id){
  			confirm_flag = false
  		}
  	})

  	if(complete_flag && !confirm_flag){
  		swal({
		  title: "Incorrect",
		  text: "You clicked the button!",
		  type: 'error'
		});
  	}
  	
  	if(confirm_flag){

  		$.post('/submit.php', 
  			{
  				name: $("#name").val(),
  				phone_number: $("#phone_number").val()
  			}, function(resp){
  				resp = JSON.parse(resp)
  				if(resp.status){
  					$("#puzzle_modal").modal('toggle');
  					// swal({
  					// 	title: 'Submitted!',
  					// 	type: 'success'
  					// })
  					$("#videoModal").modal();
  				}
  		})
  	}
}

function retry_puzzle(){
	let html1 = '<div id="dropBox_img_1" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>';
	html1 += '<div id="dropBox_img_2" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>';
	html1 += '<div id="dropBox_img_3" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>';
	html1 += '<div id="dropBox_img_4" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>';
	html1 += '<div id="dropBox_img_5" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>';
	html1 += '<div id="dropBox_img_6" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>';

	$("#dropZone").html(html1);
	draw_random_image();
}


// function autoPlayYouTubeModal() {
// 	$("#videoModal").modal();
// };
