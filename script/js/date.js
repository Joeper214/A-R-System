/*
  this library was created for date manipulation on user input interfaces
  author: BAYRON, Jofel B.
  date updated : April 1, 2014
*/

//global variables

var month_list = new Array("January", "February", "March", "April", "May",
                          "June", "July", "August", "September", "October",
                          "November", "December"); 
                                 
//raw date manipulations functions.......

function isValidDate(year, month, day){
    if(year<1960 || year>2050){
	return false;
    }else if(month>12 || month<1){
	return false;
    }else if(day<1 || day>numDays(year, month)){
	return false;
    }else{
	return true;
    }
}

function numDays(year, month){
  if(year%4 == 0 && month ==2){
    return  29;
  }else if(month == 2){
    return 28;
  }else if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12){
    return 31;
  }else{ 
    return 30;
  }
}

function compDate1toDate2(date1, date2){
    /**
       precondition: date1 and date2 are valid date string

       postcondition:
       this function will return 
          - 1 if date1 is current than date2
	  - 0 if date1 is equal to date2
	  - -1 if date1 is later than date2
       
    */
    //date 1 attributes
    var m1 = getMonthFromStr(date1);//month
    var d1 = getDayFromStr(date1);//day
    var y1 = getYearFromStr(date1);//year
    //date 2 attributes
    var m2 = getMonthFromStr(date2);//month
    var d2 = getDayFromStr(date2);//day
    var y2 = getYearFromStr(date2);//year
    
    if(y1>y2){
	return 1;
    }else if(y1==y2 && m1>m2){
	return 1;
    }else if(y1==y2 && m1==m2 && d1>d2){
	return 1;
    }else if(y1==y2 && m1==m2 && d1==d2){
	return 0;
    }else{
	return -1;
    }
}

function isLaterToday(date){
   
   var today = new Date();
   var param_date = new Date();
   param_date.setFullYear(getYearFromStr(date), getMonthFromStr(date)-1, getDayFromStr(date));
   return param_date>=today;
}    

function isValidDateFormat(str){
    if(str.length<10 || str.length>10){
	return false;
    }else if(str.charAt(2)!='/' || str.charAt(5)!='/'){
	return false;
    }else{
	var valid = false;

	var year = getYearFromStr(str);
	var month = getMonthFromStr(str);
	var day = getDayFromStr(str);
	if(isValidDate(year, month, day)){
	    valid = true;
	}
	return valid;
    }
}



//these functions will get moth, day and year 
//from a date string format mm/dd/yyyy


function getMonthFromStr(str_date){
  return str_date.substr(0,2);
}

function getDayFromStr(str_date){
  return str_date.substr(3,2);
}

function getYearFromStr(str_date){
  return str_date.substr(6,4);
}

function isValidDateForm1(str){
    if(str.length<10 || str.length>10){
	return false;
    }else if(str.charAt(2)!='/' || str.charAt(5)!='/'){
	return false;
    }else{
	return true;
    }
}

function isValidMonth(month){
    return (month>0 && month<=12);
}


//these functions will get moth, day and year 
//from a date string format mm/dd/yyyy


function getMonthFromStr(str_date){
  return str_date.substr(0,2);
}

function getDayFromStr(str_date){
  return str_date.substr(3,2);
}

function getYearFromStr(str_date){
  return str_date.substr(6,4);
}



/***************************************************
  date manipulation interface
****************************************************/

function changeDays(year, month, selection_days_object){
    /*
    postcondition: change number of days allowable in a month
                   for leap year and month is february then
                   days is 28 else 29
                   if month is either January, March, May, July, August, October, December
                   then days is 31
                   otherwise is 30
    */

    var days_obj = document.getElementById(selection_days_object);
    var currentSelectedDay = days_obj.options.value; 
    var numValidDays = numDays(year, month); 
    var lastDayFromDaysObj = parseInt(days_obj.options[days_obj.options.length-1].value);
    var numDaysFromDaysObj = days_obj.options.length;
    
    var daysDifferrence = numValidDays-lastDayFromDaysObj;
    var index = numDaysFromDaysObj;
    var counter = lastDayFromDaysObj;
    if(daysDifferrence >= 1){  
      for(var i=0; i<daysDifferrence; i++){
        days_obj.options[index] = new Option(counter+1, counter+1, false, false);
        counter+=1; 
        index+=1; 
      }
    }else{
      numDaysFromDaysObj+=daysDifferrence;
      for(var i=daysDifferrence; i < 0; i++){ 
        days_obj.options[numDaysFromDaysObj] = null;
      } 
    }
}

//refresh functions

function refreshYears(objYear, startyear){
  /*
    precondition: objYear is dropdown box copntaining years
                  startyear is the year where year start
    postcondition: refresh list of years in dropdown box
                   the list will start from the start year up to the current year
  */
  var comboYearsObj = document.getElementById(objYear);
  var numYearsinObj = comboYearsObj.options.length;
  var currentSelYear = parseInt(comboYearsObj.options[comboYearsObj.selectedIndex].value);
  var currentDay = new Date();
  
  var counter = 0;
  
  //clear
  for(var i=0;i<numYearsinObj;i++){
     comboYearsObj.options[0] = null;
  }
  //refresh
  for(var i=startyear; i<=currentDay.getFullYear(); i++){
    comboYearsObj.options[counter] = new Option( i, i, false, false);
    if(currentSelYear == i) 
      comboYearsObj.options[counter].selected = "selected";
    counter++;  
  }
}

function refreshMonths2(year, objMonths){
  /* 
  postcondition: refresh months dropdown into completely 12 months
  */ 
  //variables  
  var currentDay = new Date();        //  
  var currentyear = currentDay.getFullYear();//
  var comboMonthsObj = document.getElementById(objMonths);
  var numMonthsFromObj = comboMonthsObj.options.length;
  var currentSelMonth = parseInt(comboMonthsObj.options[comboMonthsObj.selectedIndex].value); 
  var limit =12;
  
  if(year == currentyear) 
    limit = currentDay.getMonth()+1;
  //refresh if not in 12 months 
  
  //if(numMonthsFromObj!=12){
    for(var i=0; i<numMonthsFromObj; i++){
      comboMonthsObj.options[0] = null;
    }
    for(var i=0; i<limit; i++){
      comboMonthsObj.options[i] = new Option(month_list[i], i+1, false, false);
      if(currentSelMonth==i+1)
         comboMonthsObj.options[i].selected="selected";
    }
  //}
}

function refreshMonths(year, objMonths){
  /* 
  postcondition: refresh months dropdown into completely 12 months
  */ 
  //variables  
  //var currentDay = new Date();        //  
  //var currentyear = currentDay.getFullYear();//
  var comboMonthsObj = document.getElementById(objMonths);
  var numMonthsFromObj = comboMonthsObj.options.length;
  var currentSelMonth = parseInt(comboMonthsObj.options[comboMonthsObj.selectedIndex].value); 
  var limit =12;
  
  //if(year == currentyear) 
    //limit = currentDay.getMonth()+1;
  //refresh if not in 12 months 
  //alert(limit)
  //if(numMonthsFromObj!=12){
    for(var i=0; i<numMonthsFromObj; i++){
      comboMonthsObj.options[0] = null;
    }
    for(var i=0; i<limit; i++){
      comboMonthsObj.options[i] = new Option(month_list[i], i+1, false, false);
      if(currentSelMonth==i+1)
         comboMonthsObj.options[i].selected="selected";
    }
  //}
}

function refreshDays(objDays){
  /*
    precondition: objDays is the id of a drpdown box days
    postcondition: refresh the days of dropdown box comprising 31 days
  */
  //variables
  var comboDaysObj = document.getElementById(objDays); //CDO
  var numDaysFromCDO = comboDaysObj.options.length;
  var currentSelDay = parseInt(comboDaysObj.options[comboDaysObj.selectedIndex].value); 
  
  //refresh if it is not 31 days
  if(numDaysFromCDO != 31){
    //clear
    for(var i=0;i<numDaysFromCDO; i++){
      comboDaysObj.options[0] = null;
    }
    
    //refresh
    for(var i=0; i<32; i++){
       comboDaysObj.options[i] = new Option(i+1, i+1, false, false);
       if(i+1 == currentSelDay)
         comboDaysObj.options[i].selected = "selected";
    }
  }
  
}

function refreshDays2(year, month, objDays){
  /*
    precondition: objDays is the id of a drpdown box days
    postcondition: refresh the days of dropdown box comprising 31 days
  */
  //variables
  var currentDate = new Date();  
  var currentmonth = currentDate.getMonth()+1;
  var currentyear = currentDate.getFullYear();
  var comboDaysObj = document.getElementById(objDays); //CDO
  var numDaysFromCDO = comboDaysObj.options.length;
  var currentSelDay = parseInt(comboDaysObj.options[comboDaysObj.selectedIndex].value); 
  var limit = 32;
  
  if(currentyear == year && currentmonth == month)
       limit = currentDate.getUTCDate(); 
  //alert(limit);
  //refresh if it is not 31 days
  //if(numDaysFromCDO != 31){
    //clear
    for(var i=0;i<numDaysFromCDO; i++){
      comboDaysObj.options[0] = null;
    }
    
    //refresh
    for(var i=0; i<limit; i++){
       comboDaysObj.options[i] = new Option(i+1, i+1, false, false);
       if(i+1 == currentSelDay)
         comboDaysObj.options[i].selected = "selected";
    }
    
    if(limit >= 32)
      changeDays(year, month, objDays)
  //}
  
}

//trim functions

function trimDays(objDays, numdaysToTrim){
  var comboDaysObj = document.getElementById(objDays);
  for(var i = 0; i<numdaysToTrim-1; i++){
     comboDaysObj.options[0] = null;
  }
}


function trimMonths(objMonths, numMonthsToTrim){
  var comboMonthsObj = document.getElementById(objMonths);
  for(var i=0; i<numMonthsToTrim-1; i++){
    comboMonthsObj.options[0] = null;
  }
}                                                                      
