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

# There is no "boolean" type, but FalseClass and TrueClass
# The only falsey values are false and nil. 

# Arrays
# When creating an array, you can use the following syntax to specify length etc before assigning items
arr = Array.new(5, [])
# When creating a 2d array, the subarrays are actually references to subarrays and they initially all reference the same array. This means that changing arr[4] will change all the items. The following creates new references.
arr = Array.new(10) { Array.new(10) }
# Or...
arr = [[1], [1,2]]

# Symbols
# Symbols are similar to strings, but are immutable, and therefore more memory efficient.
status = :classified

# Hashes
# Hashes can be used to pass in multiple options in a user-friendly way
def total_weight(options={}) # Options are set to a default of nil
  a = options[:soccer_ball_count] || 0 # Will set a to 0 if options[...] is false
  b = options[:tennis_ball_count] || 0
  c = options[:golf_ball_count] || 0

  (a * 410) + (b * 58) + (c * 45) + 29
end

x = total_weight()
y = total_weight(soccer_ball_count: 3, tennis_ball_count: 2, golf_ball_count: 1)
puts x
puts y