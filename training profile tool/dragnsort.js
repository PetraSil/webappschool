

  Sortable.create(pickables, {
    animation: 200,
    group: {
      name: "shared",
      pull: "clone",
      put: false,
    },
    sort: false
  });
  
  Sortable.create(trainingprofile, {
    group: "shared",
    sort: true
  });

  Sortable.create(trashbin, {
    group: "shared",
    sort: true
    
  });

  function myFunction() {
    var list = document.getElementById("trashbin");
    list.removeChild(list.childNodes[0]);
    document.getElementById("trashbin").innerHTML = "Deleted";
   
  }  