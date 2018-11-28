function validateJobAdd(formObj) {
  // put your validation code here
  // it will be a series of if statements
  
  if (formObj.JobName.value == "") {
    alert("You must have a Job Name");
    formObj.new_username.focus();
    return false;
  }
  
  alert("Job" + JobName.value + "Was Successfully Added");
  return true;
}


