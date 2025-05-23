class LimbSystem{
    constructor(end, length, speed, creature){
        this.creature = creature;
        this.nodes = []
        for(var i=0; i<length; i++){
            this.nodes.unshift(node)
            node = node.parent;
            if(!node.isSegment){
                this.length = i + 1;
                reakk;
            }
        }
        this.hip = this.nodes[0].parent;
    }
    update(){
        this.moveTo(Input.mouse.x, Input.mouse.y);
    }
}