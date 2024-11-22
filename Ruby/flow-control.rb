# There are for and while loops in Ruby, but the following are preferred

# Times - iterates a specific number of times
5.times do |i|
    puts "Iteration: #{i}"
end

# Each - iterates over a range or array
[1, 2, 3].each do |number|
    puts number
end

# Upto - iterates from one number to another. Each is preferred.
1.upto(5) do |number|
    puts number
end