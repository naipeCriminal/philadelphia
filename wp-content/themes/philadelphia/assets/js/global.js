var Global = (function(){

	var VAR= {
		ROOT_PATH:"",
		IMAGE_PATH:""
	};

	//Métodos públicos
	return{
		setVar: function($varName,$varValue){
			VAR[$varName]=$varValue;
		},
		getVar: function($varName){
			return VAR[$varName];
		}
	}

})();


