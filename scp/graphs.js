function graph(name,val,id,w,h,color = '#000',lw = 2,p = true,max = 0,min = 0) {
    let ca = document.getElementById(id)
    b = 15
    j = 5
    if(typeof name == Array){
        name = name.split(",")
    }
    if(typeof val == Array){
        val = val.split(",")
    }
    console.log(name);
    console.log(val);
    q = 0
    if (ca.getContext) {
        var ctx = ca.getContext('2d');
        ctx.beginPath();
        wn = w
        if(p){wn = w-b*2,q = b}

        wb = wn/val.length
        hg = h-b
        
        old = Number(val[0])
        if(max != 0){m = max-min}else {m = Math.max(...val)+40}
        
        hl = m/j
        hlq = h-b-b
        wk = 0
        for (let i = 0; i < val.length; i++) {
            hq = Number(val[i+1])/m*hg
            console.log(hq);
            
            ctx.moveTo(q, hg-old);
            ctx.lineTo(q+wb, hg-hq)
            ctx.textAlign = "center"
            ctx.textBaseline = "top"
            ctx.fillText(name[i], q, hg+2);
            ctx.textAlign = "center"
            ctx.textBaseline = "top"
            ctx.fillText(wk, b, hlq);
            // ctx.arc(q-wb, h-hq, 4, 0, 2*Math.PI, false);
            ctx.fillStyle = color; // зелёный цвет
            ctx.fill();
            q += wb
            old = hq
            hlq -= hg/j
            wk += hl
        }
        
        ctx.moveTo(w-q, hg);
        ctx.lineTo(q, hg)
        ctx.moveTo(w-q, hg);
        ctx.lineTo(w-q, 0)
        ctx.closePath()
        ctx.strokeStyle = color
        ctx.lineWidth = lw
        ctx.stroke();
    }
}