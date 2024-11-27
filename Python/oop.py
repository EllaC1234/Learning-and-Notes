# Class and instance variables
# Class variables are the same for every instance/object, and changing them on one object will
# change them on all objects
# Instance variables are specific only to the instance/object
class Player:
    teamName = 'Liverpool'      # class variables
    teamMembers = []

    # init is used for initializing the objects, another function _new_ is used to create the object,
    # but that is hidden and rarely used
    def __init__(self, name):
        self.name = name        # creating instance variables
        self.formerTeams = []
        self.teamMembers.append(self.name)

p1 = Player('Mark')
p2 = Player('Steve')

print("Name:", p1.name)
print("Team Members:")
print(p1.teamMembers)
print("")
print("Name:", p2.name)
print("Team Members:")
print(p2.teamMembers)


# Class, instance and static methods
class Employee:
    def __init__(self, ID=None, salary=None, department=None):
        self.ID = ID
        self.salary = salary
        self.department = department

    # Example of method overloading, which is making the method perform differently based on its arguments
    # Memory efficient and always for polymorphism
    # Instance methods are those that use instance variables
    def demo(self, a, b, c, d=5, e=None):
        print("a =", a)
        print("b =", b)
        print("c =", c)
        print("d =", d)
        print("e =", e)

Steve = Employee()
print("Demo 1")
Steve.demo(1, 2, 3)
print("\n")

print("Demo 2")
Steve.demo(1, 2, 3, 4)
print("\n")

print("Demo 3")
Steve.demo(1, 2, 3, 4, 5)


class MyClass:
    classVariable = 'educative'

    # Class methods are used with class variables and can be called using the class name. They affect all objects
    @classmethod
    def demo(cls):
        return cls.classVariable

class MyClass:

    # Static methods have no direct relation to instance or class variables. They cannot be modified by inheriting
    # objects or classes. They know nothing about the current state.
    @staticmethod
    def demo():
        print("I am a static method")

# Double underscore is used to create a private attribute, which can only be accessed from within the class.
class Employee:
    def __init__(self, ID, salary):
        self.ID = ID
        self.__salary = salary  # salary is a private property

Steve = Employee(3789, 2500)
print("ID:", Steve.ID)
print("Salary:", Steve.__salary)  # this will cause an error
print(Steve._Employee__salary)  # the _<ClassName> prefix is used to access private properties by free hand


# Data hiding/Abstraction - hiding all but relevant data
# Creating an interface for objects to communicate by so that they cannot see each other's inner workings.
# Encapsulation - binding data and methods into a single unit (a class). Most attributes are private,
# but some public methods are used to access these (often getters and setters). This protects data and 
# makes debugging easier.
class User:
    def __init__(self, userName=None, password=None):
        self.__userName = userName # private variables that are only set when the "account" is created
        self.__password = password

    def login(self, userName, password):
        if ((self.__userName.lower() == userName.lower())
                and (self.__password == password)):
            print(
                "Access Granted against username:",
                self.__userName.lower(),
                "and password:",
                self.__password)
        else:
            print("Invalid Credentials!")


Steve = User("Steve", "12345")
Steve.login("steve", "12345") 
Steve.login("steve", "6789")
print(Steve.__password) # causes an error


# Inheritance
# All child classes inherit the parent's PUBLIC fields and methods. Every class in Python is ultimately a child
# of the 'object' class.
# Types - single, multi-level, hierarchical (2+ children), multiple (2+ parents), hybrid (2+ children and parents)
class Vehicle:
    def __init__(self, make, color, model):
        self.make = make
        self.color = color
        self.model = model

    def printDetails(self):
        print("Manufacturer:", self.make)
        print("Color:", self.color)
        print("Model:", self.model)


class Car(Vehicle):
    def __init__(self, make, color, model, doors):
        # calling the constructor from parent class
        Vehicle.__init__(self, make, color, model)
        self.doors = doors

    def printCarDetails(self):
        self.printDetails()
        print("Doors:", self.doors)


obj1 = Car("Suzuki", "Grey", "2015", 4)
obj1.printCarDetails()

# super() method
# Can be used to access parent class properties when both parent and child use different properties with the
# same name, when calling parent methods, or when calling the parent's initalizr from the child's
class Vehicle:
    fuelCap = 90

class Car(Vehicle): 
    fuelCap = 50

    def display(self):
        print("Fuel cap from the Vehicle Class:", super().fuelCap)
        print("Fuel cap from the Car Class:", self.fuelCap)

obj1 = Car()  
obj1.display() 

# Polymorphism - the same object displaying different behaviours and attributes (e.g using interfaces in Java)
# Can be achieved by implementing methods with the same name in different classes or using inheritance with
# an empty/incomplete method (method overriding). You can also use operator overloading (changing Python's
# predefined methods) or duck typing