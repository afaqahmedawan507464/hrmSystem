function showCurentTime(){
   let date = new Date();
   let hour = date.getHours();
   let mintines = date.getMinutes();
   let seconds = date.getSeconds();
   var session = "AM";
   if(hour > 12){
      hour = hour - 12 ;
   }
   if(hour<=12){
    session = "PM";
   }
   hour = hour < 10 ? "0"+hour : hour;
   mintines = mintines < 10 ? "0"+mintines : mintines;
   seconds = seconds < 10 ? "0"+seconds : seconds;
  //  let time = hours + ":" + mintines + ":" + seconds + ":" + session;
  let time = hour + ":" + mintines + ":" + seconds + ":" + session;
   document.getElementById('time').innerText = time;
   setTimeout(showCurentTime,1000);
}
