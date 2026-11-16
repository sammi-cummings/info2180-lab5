document.addEventListener('DOMContentLoaded', () => {

    //Functionality for Lookup Button
    const lookupBtn = document.getElementById('lookup');
    lookupBtn.addEventListener('click', function() {

        const query = document.getElementbyId('country').value.trim();
        const url = "world.php";

        //Adds country to the url if query retrieved is not empty
        if (query !== ""){
            url +="?country=" + encodeURIComponent('query');
        }

        //Fetches data from the php server and displays it on the html file
        fetch(url).then(function(response){
            return response.text();
        }).then(function(data){
            document.getElementbyId('result').innerHTML = data;
        })
        .catch(function(error){
            console.log(error);
        })
    })
});