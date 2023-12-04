## JAVASCRIPT


// privacy policy link on other sites would look like this: 
// https://wri.org/about/privacy-policy?sitename=Some WRI Site&osanoid=12345

// working example for WRI Indonessia = ?osanoid=2451d0f9-8875-46c7-8203-0b10d2de1d21&sitename=WRI Indonesia

// for sites that aren't using Osano but need to point to wri.org's privacy policy, we're using the ':target' 
// pseudo class, so use wri.org/about/privacy-policy#wrisite

const queryString = window.location.search;
// console.log(queryString);
// pulling params i.e. '?sitename=Some WRI Site&osanoid=12345'

const urlParams = new URLSearchParams(queryString);

const thesitename = urlParams.get('sitename')
// console.log(thesitename);
// outputs sitename param i.e. 'Some WRI Site'

const osanoid = urlParams.get('osanoid')
// console.log("Osano ID is: "+osanoid);
// outputs osanoid param i.e. 'Osano ID is 12345'
// console.log("this is the id we're going to use to create the filename for the cookie json file: "+osanoid);

if (thesitename !== null) {
  thesitename2 = thesitename;
  // console.log("thesitename2 is "+thesitename2)
}
else {
  thesitename2 = "World Resources Institute";
}

if (osanoid !== null) {
  osanosrc = "https://disclosure.api.osano.com/customer/AzyfddTRtqi1560Dk/config/"+osanoid+"?language=en";
}
else {
  // setting default as flagship ID
  osanosrc = "https://disclosure.api.osano.com/customer/AzyfddTRtqi1560Dk/config/2f1a8361-e0bc-41c3-b332-023fe627c0bb?language=en";
}

onload=showSiteName();

function showSiteName(){
  document.getElementById("website-name").innerHTML = thesitename2;
}


var myArray = []

jQuery.ajax({
  method:'GET',
  url: osanosrc,
  success:function(data){
    myArray = data
    buildTable(myArray)
    console.log(myArray)
  }
})

function buildTable(data){
  var table = document.getElementById('osano-table')

  for (var i = 0; i < data.length; i++){
    var row = `<tr>
      <td>${data[i].provider}</td>
      <td>${data[i].name}</td>
      <td>${data[i].classification}</td>
      <td>${data[i].purpose}</td>
      </tr>`
    table.innerHTML += row
  }
}


##CSS

/* Hide Block List */

#wrisite:target {
    display: none;
}

/* Responsive Table */

table, thead, tbody, th, td, tr{ 
display: block; 
}
thead tr{ 
font-weight: unset;
position: absolute;
top: -9999px;
left: -9999px;
}	
tr{
margin: 25px 0px;
}	
td{ 
border: none;
position: relative;
padding: 0;
}
td:nth-of-type(1):before { content: "Provider:"; font-weight: bold; margin-right: 2px; }
td:nth-of-type(2):before { content: "Name:"; font-weight: bold; margin-right: 2px; }
td:nth-of-type(3):before { content: "Classification:"; font-weight: bold; margin-right: 2px; }
td:nth-of-type(4):before { content: "Purpose:"; font-weight: bold; margin-right: 2px; }
}


##HTML


<h4>Site Name: (<span  id="website-name"></span>)</h4>
​
<table>
	<thead>
		<tr>
                      	<th>Provider</th>
                          <th>Name</th>
                          <th>Classification</th>
			<th>Purpose</th>
		</tr>
	</thead>
	<tbody id="osano-table">
	</tbody>
</table>
