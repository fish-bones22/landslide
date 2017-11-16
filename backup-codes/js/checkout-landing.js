(function(){

  var form = $('#receipt');
  var width = form.width();
  var height = form.height();
  var size  = [width, height];  // for a4 size paper width and height


  $('#btn-create').on('click',function(){
   $('body').scrollTop(0);
   createPDF();

  });

//create pdf
function createPDF(){

  getCanvas().then(function(canvas){

  var img = canvas.toDataURL("image/png"),
  doc = new jsPDF({
    orientation: 'landscape',
    unit:'pt', 
    format:[width*0.79, height*0.88]
  });     
  doc.addImage(img, 'JPEG', 0, 0);
  doc.save('receipt'+Date.now()+'.pdf');
});

}

$("document").ready(function () {
  window.setTimeout(downloadZips(), 5000);
});


// create canvas object\
function getCanvas(){

 form.width(size[0]).css('max-width','none');

 return html2canvas(form,{
   timeout:50000

 }); 

}
}());

function downloadZips() {
  document.location = 'php/helper-functions/zipproducts.php';
}
