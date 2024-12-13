function checkData(array) { // function to check if data are valid
    for (let i = 0; i < array.length; i++) { // for loop to run the array
        if (array[i]<=0 || array[i]>10) { // If statement to check if values are ok
            return false // if values are not ok, function returns false and stops execution 
            
        }
    }  return true // if values are ok return true and contintue execution
}
function average(array) { // function to calculate average 
    var addition=0; // variable initialized at 0, where the addition of the numbers of the array will be added to 
    for (let i = 0; i < array.length; i++) { //for loop to run the array
        addition+=array[i]; // add the addition of array's numbers
    }
    var average=addition/array.length; // calculation of average

        return Math.round(average) // returns a round number
}
function countFailure(array) { // function to determine failed subjects
   var count= 0; // Variable initialized at 0 where the number of failed subjects will be added to
    for (let i = 0; i < array.length; i++) {//for loop to run the array
        if (array[i] < 6) { // If statement to check values lower than 6
            count= count+1 // add the number of failed subjects
            
        }
    } return count // return number of failed subjects
  }

var grades=[3,6,6,6]; // create array containing grades
var averageGrades=average(grades);// variable where the value of average function is stored in
if (checkData(grades)==false) { // If statement to check if values are valid
      console.log("Invalid data") // if they are invalid then show message and stop execution
    
} else { // else continue execution
     console.log(" The grade point average is " +average(grades)); //show average of numbers
    console.log(" You have failed "+countFailure(grades)+" subjects");// show number of failed subjects
    if (countFailure(grades)>3 || averageGrades<6){ // inside if statement, we use another if statement to check if student has passed or failed to pass
        console.log("Flunked") // if one of the conditions is true then show message
    
} else { // if none of the conditions are true then continue this way
switch (averageGrades) { // switch statement (still inside the first if statement),to show message based on grade point average
       case 6: // if G.P.A is 6
            console.log("Passing Grade");// show message
            break;
    case 7:// if G.P.A is 7 o 8 
    case 8:
            console.log("Good");// show message//
            break;
    case 9:// se invece è 9 o 10 
    case 10:
            console.log("Top marks");// show message
}
}
} 