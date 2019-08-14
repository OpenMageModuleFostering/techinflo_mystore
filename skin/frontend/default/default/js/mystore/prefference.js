      function showMeOne (boxone) {
        
        var chboxsone = document.getElementsByName("price");

        var visone = "none";

        for(var i=0;i<chboxsone.length;i++) { 
            if(chboxsone[i].checked){
             visone = "block";
                break;
            }
        }
        document.getElementById(boxone).style.display = visone; 
    
    }   
    
     function showMeTwo (boxtwo) {
        var chboxstwo = document.getElementsByName("category");  
        var vistwo = "none";

        for(var i=0;i<chboxstwo.length;i++) { 
            if(chboxstwo[i].checked){
             vistwo = "block";
                break;
            }
        }
         document.getElementById(boxtwo).style.display = vistwo;
     }
     
     function showMeThree (boxthree) {  
        var chboxsthree = document.getElementsByName("brand");
        var visthree = "none";
        
        for(var i=0;i<chboxsthree.length;i++) { 
            if(chboxsthree[i].checked){
             visthree = "block";
                break;
            }
        }
         document.getElementById(boxthree).style.display = visthree;
    }
