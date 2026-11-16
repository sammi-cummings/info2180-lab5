document.addEventListener('DOMContentLoaded', () => {

    //Functionality for Lookup Button
    const lookupBtn = document.getElementById('lookup');
    const lookupCitiesBtn = document.getElementById('lookup');

    lookupBtn.addEventListener('click', function() {

        const queryCountry = document.getElementbyId('country').value.trim();
        const url = "world.php";

        //Adds country to the url if query retrieved is not empty
        if (queryCountry !== ""){
            url +="?country=" + encodeURIComponent('query');
        }

        //Fetches data from the php server and displays results of country table
        fetch(url).then(function(response){
            return response.text();
        }).then(function(data){
            document.getElementbyId('result').innerHTML = data;
        })
        .catch(function(error){
            console.log(error);
        })
    })

    lookupCitiesBtn.addEventListener('click', function() {

        const queryCities = document.getElementbyId('country').value.trim();
        const url2 = "world.php";

        //Adds country to the url if query retrieved is not empty
        if (queryCities !== ""){
            url2 =+'?country =' + encodeURIComponent('queryCities') + '&lookup=cities' ;
        }

        //Fetches data from the php server and display the result of cities table 
        fetch(url2).then(function(response){
            return response.text();
        }).then(function(data){
            document.getElementbyId('result').innerHTML = data;
        })
        .catch(function(error){
            console.log(error);
        })
    })
});