
let employeeid = $("input[name*='employeeid']");
employeeid.attr("readonly","readonly");

$(".btnedit").click(e=>{
    let textvalues = displayData(e);


    let firstname = $("input[name*='fName']");
    let lastname = $("input[name*='lName']");
    let gender = $("input[name*='gender']");
    let profession = $("input[name*='profession']");
    let address = $("input[name*='address']");
    let email = $("input[name*='email']");
    let password = $("input[name*='password']");
    let phone = $("input[name*='phone']");

    employeeid.val(textvalues[0]);
    firstname.val(textvalues[1]);
    lastname.val(textvalues[2]);
    gender.val(textvalues[3]);
    profession.val(textvalues[4]);
    address.val(textvalues[5]);
    email.val(textvalues[6]);
    password.val(textvalues[7]);
    phone.val(textvalues[8]);
})

function displayData(e){
    let id=0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}

