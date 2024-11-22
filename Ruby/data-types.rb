# Dynamically typed language.
# All data types are objects.
# Primitive types are immutable, complex types are mutable.

# Strings in Ruby are mutable
a = 'HI' # Points to address 1
b = a # Mutable, points to address 1 (same as a)
a.downcase! # Bang method is applied to the underlying object, also changing b
puts b # Outputs 'hi'

a = 'HI'
b = a # Points to original address
a = 'xxx' # Creates new value, and therefore new address
puts b # Outputs 'HI'

# Arrays
# When creating an array, you can use the following syntax to specify length etc before assigning items
arr = Array.new(5, [])
# When creating a 2d array, the subarrays are actually references to subarrays and they initially all reference the same array. This means that changing arr[4] will change all the items. The following creates new references.
arr = Array.new(10) { Array.new(10) }
# Or...
arr = [[1], [1,2]]