/**
 *
 */

var mins
var secs;

function startTimer() {
	time = document.getElementById('txt').value;
	mins = parseInt(time.substring(0, time.indexOf(":")));
	secs = parseInt(time.substring(time.indexOf(":")+1));
 	redo();
}

function dis(mins,secs) {
 	var disp;
 	if(mins <= 9) {
  		disp = " 0";
 	} else {
  		disp = " ";
 	}
 	disp += mins + ":";
 	if(secs <= 9) {
  		disp += "0" + secs;
 	} else {
  		disp += secs;
 	}
 	return(disp);
}

function redo() {
 	secs--;
 	if(secs == -1) {
  		secs = 59;
  		mins--;
 	}
 	document.cd.disp.value = dis(mins,secs); // setup additional displays here.
 	if((mins == 0) && (secs == 0)) {
  		window.alert("You could not give the answer within allocated time. Better luck next time."); // change timeout message as required
  		
  		//startTimer();
  		window.location = "finished.php" // redirects to specified page once timer ends and ok button is pressed
 	} else {
 		cd = setTimeout("redo()",1000);
 	}
}