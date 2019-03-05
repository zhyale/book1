import numpy as np 

def get_noisy_digit(GSf, epsilon):
    beta = GSf/epsilon
    u = np.random.random()-0.5
    noisy_digit = 0.0 - beta * np.sign(u) * np.log(1.0 - 2 * np.abs(u))
    return np.rint(noisy_digit)

if __name__ =='__main__':    
    real_height = np.random.normal(170, 4, 10000)     # 假设为真实身高
    GSf = 50
    epsilon = 4
    pseudo_height = []   # 添加噪声后的身高
    for i in range(10000):
        pseudo_height.append(real_height[i] + get_noisy_digit(GSf, epsilon)) 
    print("平均身高 = ", np.average(real_height))
    print("添加噪声后的平均身高 = ", np.average(pseudo_height))
    print("前3位真实身高：", real_height[:3])
    print("前3位干扰后的身高：", pseudo_height[:3])
 