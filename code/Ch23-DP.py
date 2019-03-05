import numpy as np 

def get_noisy_digit(GSf, epsilon):
    beta = GSf/epsilon
    u = np.random.random()-0.5
    noisy_digit = 0.0 - beta * np.sign(u) * np.log(1.0 - 2 * np.abs(u))
    return np.rint(noisy_digit)

if __name__ =='__main__':    
    GSf = 10
    epsilon = 1
    count_err_lt_5  = 0
    for i in range(1000):
        result = 5000
        result += get_noisy_digit(GSf, epsilon)
        if np.abs(result-5000) <= 5.0:
            count_err_lt_5 += 1
        print(result)
    print(count_err_lt_5, " times error<5.")
