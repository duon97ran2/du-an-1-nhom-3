const avatar = document.querySelector('#avatar');
const preview = document.querySelector('#preview');
const btn = document.querySelector('#btn-upload');
btn.addEventListener('click',function(){
  avatar.click();
});
avatar.addEventListener('change',imageUpdate);
// const fileTypes = [
//   "image/apng",
//   "image/bmp",
//   "image/gif",
//   "image/jpeg",
//   "image/pjpeg",
//   "image/png",
//   "image/svg+xml",
//   "image/tiff",
//   "image/webp",
//   "image/x-icon"
// ];
// function validFileType(file) {
//   return fileTypes.includes(file.type);
// }
// function returnFileSize(number) {
//   if(number < 1024) {
//     return number + 'bytes';
//   } else if(number >= 1024 && number < 1048576) {
//     return (number/1024).toFixed(1) + 'KB';
//   } else if(number >= 1048576) {
//     return (number/1048576).toFixed(1) + 'MB';
//   }
// }    
function imageUpdate(){
  // while(preview.firstChild){
  //   preview.removeChild(preview.firstChild);
  // }
  const curFiles = avatar.files;
  // if(curFiles.length===0){
  //   const para = document.createElement('p');
  //   para.textContent = "No files currently selected for upload";
  //   preview.appendChild(para);
  // }
  // else{
  //   const list = document.createElement('ul');
  //   preview.appendChild(list);
    for(const file of curFiles){
        // para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
        const image = document.querySelector('#avatar-img');
        image.src = URL.createObjectURL(file);}
        // image.style.width = '100px';
        // listItem.appendChild(image);
        // listItem.appendChild(para);
  //     }
  //     else{
  //       para.textContent = `File name ${file.name} : Not a valid type. Update your selection`;
  //       listItem.appendChild(para);
  //     }
  //     list.appendChild(listItem);
  //   }
}