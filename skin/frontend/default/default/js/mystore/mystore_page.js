      function showMeNoOne (boxnoone) {
        
        var chboxsone = document.getElementsByName("price");

        var visone = "none";

        for(var i=0;i<chboxsone.length;i++) { 
            if(chboxsone[i].checked){
             visone = "block";
                break;
            }
        }
        document.getElementById(boxnoone).style.display = visone;
		
    }   
    
     function showMeNoTwo (boxnotwo) {
        var chboxstwo = document.getElementsByName("category");  
        var vistwo = "none";

        for(var i=0;i<chboxstwo.length;i++) { 
            if(chboxstwo[i].checked){
             vistwo = "block";
                break;
            }
        }
         document.getElementById(boxnotwo).style.display = vistwo;
     }
     
     function showMeNoThree (boxnothree) {  
        var chboxsthree = document.getElementsByName("brand");
        var visthree = "none";
        
        for(var i=0;i<chboxsthree.length;i++) { 
            if(chboxsthree[i].checked){
             visthree = "block";
                break;
            }
        }
         document.getElementById(boxnothree).style.display = visthree;
    }