# All programs in Ruby run within the "main" object, so variables come in the following types:
# 1. Global variables ($)
# 2. Instance variables (@) - variables available throughout the instance scope, so can act like global variables when used with an instance of "main"
# 2. Local variables

# Modules are similar to mixins in Python, allowing multiple classes to implement the same functionality without forming a strict relationship
# Modules are preferred over class functions and module_function can make a module's functions directly callable
module FuelEfficient
    def efficient_drive
      puts "Driving efficiently!"
    end
end

class Vehicle
    def initialize(color)
        @color = color
    end

    def honk
        puts "Honk!"
    end
end

class HybridCar < Vehicle # Inherits from parent class
    include FuelEfficient # Includes module code
    # Creates getter and setter functions automatically
    # Getters and setters give more control than just directly accessing the values, since validation and additional functionality can be implemented
    attr_accessor :battery_range

    def initialize(color, battery_range)
        super(color)
        @battery_range = battery_range
    end

    def electric_mode
        puts "Running on electric power!"
    end
end

hybrid_car = HybridCar.new("Blue", 200)
hybrid_car.honk
hybrid_car.efficient_drive
hybrid_car.electric_mode