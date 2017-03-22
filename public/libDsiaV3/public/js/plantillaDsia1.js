function configuracion(){
	new Jx.Layout('contenedor');
    new Jx.Layout('encabezado', {
        top: 0,
        bottom: 0,
        width: null,
        height: 60,
        right: 30,
        left: 10
    });   	
    new Jx.Layout('barras', {
        top: 65,
        bottom: 35,
        width: null,
        height: 35,
        right: 10,
        left: 10
    });
    new Jx.Layout('barra1', {
    	top:0,
    	height:30
    });
    new Jx.Layout('barra2', {
    	top:0,
    	bottom:0,
        width: 0,
        height: 0,
        right: 0,
        left: null
    });
    new Jx.Layout('barra3', {
    	top:120,
    	bottom:0,
    	width: 200,
    	height: 40,
    	right: 100,
    	left: null
    });
    new Jx.Layout('contenido', {
        top: 100,
        bottom: 35,
        width: null,
        height: null,
        right: 10,
        left: 10
    }); 
    new Jx.Layout('piePagina', {
        top:null,
        height: 20,
        width: null,
        right: 10,
        left: 10
    });
	var splitter1 = new Jx.Splitter('barras', {
		elements: ['barra1','barra2'],
		containerOptions: [{},{width: 400}]
	});    
	/*
	var splitter2 = new Jx.Splitter('contenido', {
		elements: ['Map','herramientas','opciones'],
		containerOptions: [{},{width: 250},{width: 200}]
	});    
	*/
	
	/*
    var p1 = new Jx.Panel({
	    label: 'Navegación', 
	    content: 'HerramientasNavegacion', 
        collapse: false, 
        maximize: true,
	    height: 60
    });
    var p2 = new Jx.Panel({
	    label: 'Dibujo', 
	    content: 'HerramientasDibujo', 
        collapse: false, 
        maximize: true,
	    height: 60
    });
    var p3 = new Jx.Panel({
	    label: 'Mapa', 
	    content: 'HerramientasMapa', 
        collapse: false, 
        maximize: true
    });
	var p4 = new Jx.Panel({
	    label: 'Ubicación Relativa', 
	    content: 'HerramientasNavegacion',  
	    collapse: false, 
        maximize: true
	});    
	var p5 = new Jx.Panel({
		label: 'Instrucciones de uso', 
		content: 'HerramientasNavegacion', 
		collapse: false, 
		maximize: true
	});    
	*/
 //   var pm = new Jx.PanelSet({parent: 'herramientas', panels: [p1,p5]});    
	
	/** Inicio panel de opciones */
	/*
	var op1 = new Jx.Panel({
		label: 'Leyenda', 
	    content: 'Legend', 
	    collapse: false, 
	    maximize: false
		});
	var op2 = new Jx.Panel({
	    label: 'InformaciÃ³n del atributo', 
	    content: 'SelectionPanel', 
	    collapse: false, 
	    maximize: false
	});
	var op3 = new Jx.Panel({
		label: 'Búsquedas', 
		content: 'buscar',
		height: 140,
		collapse: false, 
		maximize: false
	});
	var pm2 = new Jx.PanelSet({parent: 'opciones', panels: [op1,op3,op2]});
	*/
	/** Fin panel de opciones */
	$('contenedor').resize({forceResize: true});
	$('contenedor').style.visibility = 'visible';
//    });	
  	var options = {}
};