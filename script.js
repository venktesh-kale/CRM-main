function onClickMenu()
{
    document.getElementById("ham_icon").classList.toggle("ham_change")
    document.getElementById("navmenu").classList.toggle("navmenu_change")
    document.getElementById("side_navbar").classList.toggle("side_navbar_change")
}

function popup_action()
{
    document.getElementById("popback").classList.toggle("popback_change")
    document.getElementById("popup").classList.toggle("popbody")
}

function popup_view()
{
    document.getElementById("popback").classList.toggle("popback_change")
    document.getElementById("popbody_view").classList.toggle("popbody_view")
}  

function serachPop()
{
    document.getElementById("popback").classList.toggle("popback_change")
    document.getElementById("popbody_search_before").classList.toggle("popbody_search")
}

function notiPop()
{
    document.getElementById("popback").classList.toggle("popback_change")
    document.getElementById("popbody_notification_before").classList.toggle("popbody_notification")
}

document.getElementById("searchForm").addEventListener("submit", function(event) 
{
    event.preventDefault(); // Prevent default form submission

    var customerId = document.getElementById("customer_id").value;

    // Make AJAX request to fetch VLE Name
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_vle_name.php?customer_id=" + customerId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            // Update the h2 heading with the fetched VLE Name
            document.getElementById("customerNameDashboard").textContent = response;
            document.getElementById("customerNameInActions").textContent = response;
            // document.getElementById("customerNameOnLogoutBtn").textContent = response;

        }
    };
    xhr.send();
});

document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    var customerId = document.getElementById("customer_id").value;

    // Make AJAX request to fetch VLE Name, Mobile Number, and CSC ID
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_customer_data.php?customer_id=" + customerId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            // Update the HTML elements with the fetched data
            document.getElementById("customerNameInQuickView").textContent = response.customerName;
            document.getElementById("mobileNumber").textContent = response.mobileNumber;
            document.getElementById("cscId").textContent = response.cscId;

        }
    };
    xhr.send();
});

// document.getElementById("searchForm").addEventListener("submit", function(event) {
//     event.preventDefault(); // Prevent default form submission

//     var customerId = document.getElementById("customer_id").value;

//     // Make AJAX request to fetch customer data
//     var xhr = new XMLHttpRequest();
//     xhr.open("GET", "fetch_customer_data.php?customer_id=" + customerId, true);
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             var response = JSON.parse(xhr.responseText);

//             // Update table cells with fetched data
//             document.getElementById("district").textContent = response.district;
//             document.getElementById("subDistrict").textContent = response.subDistrict;
//             document.getElementById("totalTxn").textContent = response.totalTxn;
//             document.getElementById("panApplications").textContent = response.panApplications;
//             document.getElementById("agricultureService").textContent = response.agricultureService;
//         }
//     };
//     xhr.send();
// });

document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    var customerId = document.getElementById("customer_id").value;

    // Make AJAX request to fetch customer data
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_customer_data_more.php?customer_id=" + customerId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update table body with fetched data
            document.getElementById("customerDataTable").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});

//Temporary Profile
function profileInfo() {
    var customer_id = document.getElementById('customer_id').value;
    window.location.href = 'profile.php?customer_id=' + 8421279597;
}

function fetchBGLReview() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("customer-history").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "FetchBGLReview.php", true);
    xhr.send();
    }

function fetchPenaltyReview(){
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("customer-history").innerHTML = this.responseText;
    }
};
xhr.open("GET", "FetchPenaltyReview.php", true);
xhr.send();
}
function fetchEnquiryHistory(){
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("customer-history").innerHTML = this.responseText;
    }
};
xhr.open("GET", "FetchEnquiryHistory.php", true);
xhr.send();
}

function fetchComplaintHistory() {
    var customerId = document.getElementById("customer_id").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("customer-history").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "fetchComplaintHistory.php?customer_id=" + 8421279597, true);
    xhr.send();
}

function fetchCallHistory() {
    var customerId = document.getElementById("customer_id").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("customer-history").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "fetchCallHistory.php?customer_id=" + 8421279597, true);
    xhr.send();
}