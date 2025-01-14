# Stack - first in, last out
# Example use cases: checking for balanced brackets, reversing strings and lists, undo mechanisms
class Stack():
    def __init__(self):
        self.items = []

    def push(self, item):
        self.items.append(item)				

    def pop(self):
        return self.items.pop()
    
    def is_empty(self):
        return self.items == []
        
    def get_stack(self):
        return self.items

myStack = Stack()
print(myStack.is_empty()) 