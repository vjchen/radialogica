function BinarySearchTree() {
    this._root = null;
}

BinarySearchTree.prototype = {

    //restore constructor
    constructor: BinarySearchTree,

    add: function (value){
        //set input value
        var node = {
                value: value,
                left: null,
                right: null
            },

        //used to traverse the structure
            current;

        //check to see if tree has any values or if its a new tree.
        if (this._root === null){
            this._root = node;
        } else {
            current = this._root;

            while(true){

                //if the input value is less than this current value, continue left
                if (value < current.value){

                    //if no value at current node then set current node to input value
                    if (current.left === null){
                        current.left = node;
                        break;
                    } else {
                        current = current.left;
                    }

                    //if the input value is greater than this current value, continue right
                } else if (value > current.value){

                    //if no value at current node then set current node to input value
                    if (current.right === null){
                        current.right = node;
                        break;
                    } else {
                        current = current.right;
                    }

                } else {
                    break; //if value exists at current node then ignore since duplicates not allowed on tree.
                }
            }
        }
    }
};